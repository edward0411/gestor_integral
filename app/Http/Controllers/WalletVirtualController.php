<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilHelper;
use App\Http\Requests\WalletStoreRequest;
use App\Models\RequestQuote;
use App\Models\WalletDetail;
use App\Models\WalletVirtual;
use App\Models\Work;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletVirtualController extends Controller
{
    use ApiResponser;

    public function index($id = null){
        if($id) {
            $tutorPayments = RequestQuote::handleUser($id);
        }else{
            $tutorPayments = RequestQuote::orderBy('created_at');
        }
        return view('wallet_virtual.index', ['tutorPayments' => $tutorPayments->get()]);
    }

    public function show($quote){
        $work = Work::handlerQuote($quote)->first();
        return view('wallet_virtual.show',compact('work'));
    }

    public function showWalletDetail(WalletDetail $walletDetail){
        return $this->successResponse($walletDetail);
    }

    public function store(WalletStoreRequest $request, Work $work){
        $data = $request->all();
        try {
            if ($request->value <= $work->walletVirtual->balance) {
                if ($request->value > 0) {
                    $data['wallet_virtual_id']  = $this->storeWalletVirtual($work->id);
                    $data['created_by']         = Auth::user()->id;
                    $walletDetail               = WalletDetail::create($data);
                    if($request->hasFile('vaucher')){
                        $file = $request->file('vaucher');
                        $walletDetail->vaucher = UtilHelper::saveFile('\folders\wallet', $file);
                        $walletDetail->save();
                    }

                    // cambiar el estado de la billetera virtual
                    if($walletDetail->walletVirtual->balance == 0) $this->handlerStateWalletVirtual($work->id, WalletVirtual::PAGADA);

                    return $this->showMessage('Pago realizado con exito');
                }
                return $this->showMessage('No se puede realizar un pago negativo o de 0', 400, false);
            }
            return $this->showMessage('El pago no puede exceder el saldo', 400, false);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function edit(Request $request, Work $work){

        $this->validate($request,
            [
                'reference'            => 'required|unique:wallet_details,reference,'.$request->id,
            ],
            [
                'reference.unique'     => 'Esta referencia de pago ya se encuentra registrada en el sistema',
            ]
        );
        $data           = $request->all();
        $walletDetail   = WalletDetail::find($request->id);
        try {
            if ($request->value > $walletDetail->value) {
                if ($walletDetail->walletVirtual->balance > 0) {
                    if ($request->value > $walletDetail->walletVirtual->balance) {
                        return redirect()->route('wallet.show', $walletDetail->walletVirtual->work->request_quote_id)->with('error','No puedes axcederte del saldo');
                    }
                }else{
                    return redirect()->route('wallet.show', $walletDetail->walletVirtual->work->request_quote_id)->with('error','No puedes axcederte del saldo');
                }
            }
            $walletDetail->update($data);
            if($request->hasFile('vaucher')){
                $file = $request->file('vaucher');
                $walletDetail->vaucher = UtilHelper::saveFile('\folders\wallet', $file);
                $walletDetail->save();
            }
            // cambiar el estado de la billetera virtual
            $this->handlerStateWalletVirtual($work->id, $walletDetail->walletVirtual->balance == 0 ? WalletVirtual::PAGADA:WalletVirtual::PDT_PAGO);
            return redirect()->route('wallet.show', $walletDetail->walletVirtual->work->request_quote_id)->with('success','Pago actualizado con exito');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    function storeWalletVirtual($id){
        $wallet = WalletVirtual::handleWork($id)->first();
        if(!$wallet){
            $wallet = WalletVirtual::create([
                'status'        => WalletVirtual::PDT_PAGO,
                'work_id'       => $id,
                'created_by'    => Auth::user()->id,
            ]);
        }
        return $wallet->id;
    }

    function handlerStateWalletVirtual($id, $status){
        $wallet = WalletVirtual::handleWork($id)->first();
        $wallet->update([
            'status' => $status,
        ]);
    }

    public function delete(WalletDetail $walletDetail){
        $walletDetail->delete();
        // cambiar el estado de la billetera virtual
        $this->handlerStateWalletVirtual($walletDetail->walletVirtual->work_id, $walletDetail->walletVirtual->balance == 0 ? WalletVirtual::PAGADA : WalletVirtual::PDT_PAGO);


        // if($walletDetail->walletVirtual->balance == 0) $this->handlerStateWalletVirtual($walletDetail->walletVirtual->work_id, WalletVirtual::PAGADA);
        // if($walletDetail->walletVirtual->balance > 0) $this->handlerStateWalletVirtual($walletDetail->walletVirtual->work_id, WalletVirtual::PDT_PAGO);

        return redirect()->route('wallet.show', $walletDetail->walletVirtual->work->request_quote_id)->with('success','Pago eliminado con exito');
    }
}
