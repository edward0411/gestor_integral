<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;
use App\User;

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

        return view('customers.create');
    }

    public function edit($id)
    {
        dd($id);
        return view('customers.edit');
    }

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
