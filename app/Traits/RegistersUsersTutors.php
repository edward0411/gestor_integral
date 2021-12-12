<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsersTutors
{

    public function showRegistrationTutorsForm()
    {
        return view('auth.registerTutors');
    }

    public function register_tutors(Request $request)
    {   
        $this->validator_tutor($request->all())->validate();

        event(new Registered($user = $this->create_tutor($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        $user->assignRole('Tutor');

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

}