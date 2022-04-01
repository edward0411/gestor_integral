<?php namespace app\Traits;

use App\Http\Helpers\EmailHelper;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coins as coins;
use App\Models\Parametrics;
use App\Models\Countries as countries;
use Illuminate\Support\Facades\DB;
use App\Models\AdminProcess;

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
        $token = mt_rand(1000,9999);
        $this->validator_client($request->all())->validate();

        event(new Registered($user = $this->create_client($request->all(),$token)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        $rol = $this->getRoles()->where('id',4)->first();
        $user->assignRole($rol->name);

        if ($user->email) EmailHelper::SendEmailWelcome($user,$token);

        $sala = new AdminProcess();
        $sala->id_user = $user->id;
        $sala->created_by = $user->id;
        $sala->save();


        $sala->messages_admin()->create([
            'id_user' => 1,
            'ma_date_message' => date('Y-m-d H:i:s'),
            'ma_text_message' => sprintf(
                '¡Te damos la bienvenida! a tusTareas.com en nombre de la institución, reciban el más cordial saludo'
                . 'Quedamos muy pendientes de cualquier inquietud o comentario…'
                .'Recuerda que puedes contactarnos en cualquier momento…'
            ),
            'ma_state' => 0,
            'created_by' =>1,
        ]);


        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

}
