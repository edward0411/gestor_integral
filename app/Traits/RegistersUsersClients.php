<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coins as coins;
use App\Models\Parametrics;
use App\Models\Countries as countries;
use Illuminate\Support\Facades\DB;

trait RegistersUsersClients
{
    public function showRegistrationClientsForm()
    {
        $countries = DB::table('countries')->whereNull('deleted_at')->select('id','c_indicative','c_name')->get();
        $coins = coins::all();
        $means = Parametrics::where('p_category','=','means_type')->get();
        return view('auth.registerClients',compact('countries','coins','means'));
    }

    public function register_clients(Request $request)
    {   
        $this->validator_client($request->all())->validate();

        event(new Registered($user = $this->create_client($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        $rol = $this->getRoles()->where('id',$request->role)->first();
        $user->assignRole($rol->name);

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

}
