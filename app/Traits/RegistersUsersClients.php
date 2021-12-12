<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coins as coins;
use App\Models\Countries as countries;
use Illuminate\Support\Facades\DB;

trait RegistersUsersClients
{
    public function showRegistrationClientsForm()
    {
        $countries = DB::table('countries')->whereNull('deleted_at')->select('id','c_name')->get();
        $coins = coins::all();
        return view('auth.registerClients',compact('countries','coins'));
    }

    public function register_clients(Request $request)
    {   
        $this->validator_client($request->all())->validate();

        event(new Registered($user = $this->create_client($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        $user->assignRole('Cliente');

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

}
