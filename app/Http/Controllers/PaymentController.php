<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilHelper;
use App\Http\Requests\PaymentStoreRequest;
use App\Models\Payment;
use App\Models\RequestQuote;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use ApiResponser;

    public function index(){

        $quotes = RequestQuote::orderBy('created_at')->get();
        return view('payments.index',compact('quotes'));
    }

    public function show(RequestQuote $quote){
        return view('payments.show',compact('quote'));
    }

    public function showPayment(Payment $payment){
        return $this->successResponse($payment);
    }

    public function edit(Request $request, RequestQuote $quote){
        $payment = Payment::find($request->id);
        $data = $request->all();
        if ($request->value > $payment->value) {
            if ($quote->balance > 0) {
                if ($request->value > $quote->balance) {
                    return redirect()->route('payment.show', $quote->id )->with('success','No puedes axcederte del saldo');
                }
            }else{
                return redirect()->route('payment.show', $quote->id )->with('success','No puedes axcederte del saldo');
            }
        }
        $payment->update($data);
        if($request->hasFile('vaucher')){
            $file = $request->file('vaucher');
            $payment->vaucher = UtilHelper::saveFile('\folders\payments', $file);
            $payment->save();
        }
        return redirect()->route('payment.show', $quote->id )->with('success','Pago actualizado con exito');
    }

    public function store(PaymentStoreRequest $request, RequestQuote $quote){
        $data = $request->all();
        try {
            if ($quote->balance > 0) {
                if ($request->value <= $quote->balance) {
                    $data['request_quote_id']   = $quote->id;
                    $data['payment_type']       = $request->value == $quote->balance ? 'TOTAL':'PARCIAL';
                    $payment                    =  Payment::create($data);
                    if($request->hasFile('vaucher')){
                        $file = $request->file('vaucher');
                        $payment->vaucher = UtilHelper::saveFile('\folders\payments', $file);
                        $payment->save();
                    }
                    return $this->showMessage('Pago realizado con exito');
                }
                return $this->showMessage('El pago no puede exceder el saldo', 400, false);
            }
            return $this->showMessage('No se puede efectuar el pago. Esta cotización no tiene saldo pendiente', 400, false);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function delete(Payment $payment){
        $payment->delete();
        return redirect()->route('payment.show', $payment->request_quote_id )->with('success','Pago eliminado con exito');
    }
}
