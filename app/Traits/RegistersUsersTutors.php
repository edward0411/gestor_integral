<?php namespace app\Traits;

use App\Http\Helpers\EmailHelper;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coins as coins;
use App\Models\Countries as countries;
use Illuminate\Support\Facades\DB;
use App\Models\Parametrics;

trait RegistersUsersTutors
{

    public function showRegistrationTutorsForm()
    {
        $countries = DB::table('countries')->whereNull('deleted_at')->select('id','c_indicative','c_name')->get();
        $means = Parametrics::where('p_category','=','means_type')->orderby('p_order')->get();
        $type_docs = Parametrics::where('p_category','=','type_documents')->orderby('p_order')->get();
        return view('auth.registerTutors',compact('countries','means','type_docs'));
    }

    public function register_tutors(Request $request)
    {
        $this->validator_tutor($request->all())->validate();

        event(new Registered($user = $this->create_tutor($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        $rol = $this->getRoles()->where('id',6)->first();
        $user->assignRole($rol->name);

        if ($user->email) EmailHelper::SendEmailWelcome($user);

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

}
