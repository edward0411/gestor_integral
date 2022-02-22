<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilHelper;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Countries as countries;
use App\Models\Parametrics as parametrics;
use App\User as profile;
use App\Models\Bonds as bonds;
use App\Models\ChangedRequest;
use App\Traits\Managment;
use App\Models\Coins as coins;
use App\User;

class ProfileController extends Controller
{
    use Managment;

    public function index_basic_data($id){

        $id_rol = Auth::user()->roles()->first()->id;

        $state = 1;
        $data = $this->getInfoUsers($id_rol,$state)->where('users.id',$id)->select('users.*','countries.c_name','coun.c_indicative','coins.c_currency','coins.c_type_currency')->first();
        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();
        $coins = coins::all();

        return view('profile.index_basic_data',compact('data','state','countries','type_docs','means','coins'));

    }

    public function index_bonds($state){
        
        $bonds = $this->infoBonds($state)->get();
        
        
        return view('profile.index_bonds',compact('bonds'));
    }

    public function create_bonds(){

        $state = 1;
        $data = $this->getInfoUsers(4,$state)->select('users.id as id_user','users.u_nickname','coins.*')->get();
        $type_bonds = $this->getDataParametrics('param_type_bonds')->orderby('p_order')->get();
        $type_value = $this->getDataParametrics('param_type_value')->orderby('p_order')->get();

        return view('profile.create_bonds',compact('type_bonds','type_value','data'));
    }

    public function edit_bonds($id){

        $state = 1;
        $bonds = $this->infoBonds($state)->find($id);

        $data = $this->getInfoUsers(4,$state)->select('users.id as id_user','users.u_nickname','coins.*')->get();
        $type_bonds = $this->getDataParametrics('param_type_bonds')->orderby('p_order')->get();
        $type_value = $this->getDataParametrics('param_type_value')->orderby('p_order')->get();


        return view('profile.edit_bonds',compact('type_bonds','type_value','data','bonds'));
    }

    public function store(Request $request){

       $validate = $this->getDataParametrics('param_type_value')->find($request->type_value);
       
        try {
            if($validate->p_text == "Porcentaje" )
            {

                if($request->b_value > 100)
                {
                    return redirect()->back()->with('error', 'Si el tipo de bono o anticipo es porcentaje, el valor no puede ser superior a 100.');
                }
            }
            if(!isset($request->id))
            {
                $bonds = new bonds;
            }else{
                $bonds = bonds::where('id', '=', $request->id)->first();
            }

            $bonds->id_user = $request->id_user;
            $bonds->id_type_bond = $request->type_bond;
            $bonds->id_type_value = $request->type_value;
            $bonds->b_value = $request->b_value;
            $bonds->b_state = 1;
            $bonds->id_coin = $request->id_coins;
            if (!isset($request->id)) {
                $bonds->created_by = Auth::user()->id;
            } else {
                $bonds->updated_by = Auth::user()->id;
            }
            $bonds->save();

            if(!isset($request->id))
            {
                return redirect()->route('profile.index_bonds',1)->with('success','Registro creado con éxito');
            }else{
                return redirect()->route('profile.index_bonds',1)->with('success','Registro actualizado con éxito');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function delete($id){

        try {
            $bonds = bonds::where('id','=',$id)->firstOrFail();
            $bonds->deleted_by = Auth::user()->id;
            $bonds->save();
            $bonds->delete();
            return redirect()->route('profile.index_bonds',1)->with('success', trans('Registro eliminado con éxito'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function change_password(){



        return view('profile.change_password');

    }

    public function change_password_store(request $request)
    {
       dd($request);

        return back()->with('success','se ha cambiado la clave');

    }

    public function list_basic_data(){
        $requestUsers = User::stateUser()->get();
        return view('profile.list_basic_data', compact('requestUsers'));
    }

    public function showRequestUser(User $user){
        $requestUsers = ChangedRequest::handleUser($user->id)->get();
        return view('profile.show_changed_request', compact('requestUsers','user'));
    }

    public function handlerRequestUsersState(ChangedRequest $request, $state){
        $request->update([
            'request_state' => $state
        ]);
        if ($state == ChangedRequest::APROBADO) {
            $user = User::find($request->id_user);
            $user->update([
                $request->request_name => $request->request_value
            ]);
        }
        return redirect()->back()->with('success', trans('Registro guardado con exito'));
    }

    public function storeRequestUser(Request $request){
        $data       = [];
        $handler    = 0;
        $user_id    = Auth::user()->id;

        $this->validate($request,
            [
                'u_nickname'        => 'bail|nullable|string|unique:users,u_nickname,'.$user_id,
                'u_num_doc'         => 'bail|nullable|numeric|unique:users,u_num_doc,'.$user_id,
                'email'             => 'bail|nullable|email|unique:users,email,'.$user_id,
                'u_key_number'      => 'bail|nullable|numeric|unique:users,u_key_number,'.$user_id,

            ],
            [
                'u_nickname.unique'     => 'El Nombre de usuario está en uso',
                'u_num_doc.unique'      => 'EL documento está en uso',
                'email.unique'          => 'EL email está en uso',
                'u_key_number.unique'   => 'EL numero de telefono está en uso',
            ]
        );
        try {
            if ($request->u_name) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_name')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de nombre en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_name', $request->u_name, $request->observation_name));
                $handler++;
            }
            if ($request->u_nickname) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_nickname')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de nombre de usuario en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_nickname', $request->u_nickname, $request->observation_nickname));
                $handler++;
            }
            if ($request->u_type_doc) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_type_doc')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de tipo de documento en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_type_doc', $request->u_type_doc, $request->observation_type));
                $handler++;
            }
            if ($request->u_num_doc) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_num_doc')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de numero de documento en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_num_doc', $request->u_num_doc, $request->observation_doc));
                $handler++;
            }
            if ($request->u_id_country) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_id_country')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de paies en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_id_country', $request->u_id_country, $request->observation_country));
                $handler++;
            }
            if ($request->u_indicativo) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_indicativo')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de indicativo en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_indicativo', $request->u_indicativo, $request->observation_indicative));
                $handler++;
            }
            if ($request->u_key_number) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_key_number')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de numero de telefono en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_key_number', $request->u_key_number, $request->observation_number));
                $handler++;
            }
            if ($request->u_id_means) {
                if(ChangedRequest::handleUser($user_id)->handleName('u_id_means')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de medio de contacto en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'u_id_means', $request->u_id_means, $request->observation_means));
                $handler++;
            }
            if ($request->email) {
                if(ChangedRequest::handleUser($user_id)->handleName('email')->handleState(ChangedRequest::PENDIENTE)->first()) return redirect()->back()->with('error', trans('Usted tiene una solitud de email en curso'));
                array_push($data, $this->handlerArrayRequestUser($user_id, 'email', $request->email, $request->observation_email));
                $handler++;
            }

            if ($handler > 0) {
                for ($i=0; $i < $handler ; $i++) {
                    ChangedRequest::create($data[$i]);
                }
            }else{
                return redirect()->back()->with('error', trans('Debe ingresar alguna solicitud '));
            }
            return redirect()->back()->with('success', trans('Registro guardado con exito'));

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    function handlerArrayRequestUser($id, $name, $value, $observation){
        return [
            'id_user'               => $id,
            'request_name'          => $name,
            'request_value'         => $value,
            'request_observation'   => $observation,
            'created_by'            => $id,
        ];
    }
}
