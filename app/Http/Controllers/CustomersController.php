<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;
use App\Models\Coins as coins;
use App\User as customers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    use Managment;

    public function active()
    {
        $state = 1;
        $data = $this->getInfoUsers(4,$state)->select('users.*','countries.c_name','coins.c_currency','coins.c_type_currency')
        ->get();

        return view('customers.index',compact('data','state'));
    }

    public function inactive()
    {
        $state = 4;
        $data = $this->getInfoUsers(4,$state)->select('users.*','countries.c_name','coins.c_currency','coins.c_type_currency')
        ->get(); 

        return view('customers.index',compact('data','state'));
    }

    public function create()
    {

        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();
        $coins = coins::all();

        return view('customers.create',compact('countries','type_docs','means','coins'));
    }

    public function edit($id)
    {
        $state = 1;
        $data = $this->getInfoUsers(4,$state)->where('users.id',$id)->select('users.*','countries.c_name','coun.c_indicative','coins.c_currency','coins.c_type_currency')->get();
        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();
        $coins = coins::all();
        //dd($data);
        return view('customers.edit',compact('data','state','countries','type_docs','means','coins'));
    }

    public function store_customer(Request $request){

        //dd($request);
        
        $this->validate($request,[
            'u_nickname' => ['required', 'string', 'max:50','unique:users'],
            'u_key_number' => ['required', 'string','min:8', 'max:15'],
            'u_id_country' => ['required', 'numeric'],
            'u_indicativo' => ['required'],
            'u_id_means' => ['required', 'numeric'],
            'u_id_money' => ['required', 'numeric'],
           ]);

        try {

           $pass = $request->u_nick_name.'_'.$request->u_num_doc;

           $password = Hash::make($pass);

           $customer = new customers();
           $customer->u_name = $request->u_name;
           $customer->u_nickname = $request->u_nickname;
           $customer->u_key_number = $request->u_key_number;
           $customer->u_id_country = $request->u_id_country;
           $customer->u_indicativo = $request->u_indicativo;
           $customer->u_id_means = $request->u_id_means;
           $customer->u_id_money = $request->u_id_money;
           $customer->email = $request->email;
           $customer->password = $password;
           $customer->u_state = 1;
           $customer->created_by = Auth::user()->id;
           $customer->save();

           $rol = $this->getRoles()->where('id',4)->first();
           $customer->assignRole($rol->name);

    
           return redirect()->route('customers.index')->with('success','Registro creado con éxito');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

    }

   /* public function active_state($id)
    {
        $customer_active  = customers::where('id', $id)->firstOrFail();
        $customer_active ->u_state = 1;
        $customer_active ->update();

        return redirect()->route  ('customers.index')->with('success', trans('Registro activado con éxito'));
    }*/

    public function processState($id)
    {
        $user = User::find($id);

        if($user->u_state == 4){
            $user->update([
                'u_state' => 0
            ]);


        }else{
            $user->update([
                'u_state' => 4
            ]);

            if($user->roles()->first()->id == 6){
                $this->changeStateRegister('tutors_bank_details',$user->id);
                $this->changeStateRegister('language_tutors',$user->id);
                $this->changeStateRegister('tutors_systems',$user->id);
                $this->changeStateRegister('tutors_topics',$user->id);
                $this->changeStateRegister('tutors_services',$user->id);              
            }
        }

        if($user->roles()->first()->id == 4){

            if($user->u_state == 4){
                return redirect()->route('customers.index')->with('success','Registro actualizado con éxito');
            }else{
                return redirect()->route('customers.inactives')->with('success','Registro actualizado con éxito');
            }

        }elseif($user->roles()->first()->id == 6){
            if($user->u_state == 4){
                return redirect()->route('tutors.index')->with('success','Registro actualizado con éxito');
            }else{
                return redirect()->route('tutors.index')->with('success','Registro actualizado con éxito');
            }
        }else{
                return redirect()->route('employees.index')->with('success','Registro actualizado con éxito');
        }
    }
}
