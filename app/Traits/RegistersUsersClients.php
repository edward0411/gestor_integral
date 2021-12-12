<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsersClients
{
    public function showRegistrationClientsForm()
    {
        return view('auth.registerClients');
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
