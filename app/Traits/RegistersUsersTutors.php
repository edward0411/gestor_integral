<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coins as coins;
use App\Models\Countries as countries;
use Illuminate\Support\Facades\DB;

trait RegistersUsersTutors
{

    public function showRegistrationTutorsForm()
    {  
        $countries = DB::table('countries')->whereNull('deleted_at')->select('id','c_name')->get();
        return view('auth.registerTutors',compact('countries'));
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