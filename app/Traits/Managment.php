<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Parametrics;
use App\Models\Countries as countries;
use App\Models\Areas as areas;
use App\Models\Subjects;
use App\User;
use App\Models\TutorLanguage;
use App\Models\TutorsBanks;
use App\Models\TutorService;
use App\Models\TutorSystem;
use App\Models\TutorTopic;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Managment
{ 
    public function getInfoCountries()
    {
        $countries = countries::select('id','c_name');
        return $countries;
    }
    public function getDataParametrics($category)
    {
        $query = parametrics::where('p_category',$category);
        return $query;
    }

    public function getRoles()
    {
        $roles = DB::table('roles');
        return $roles;
    }

    public function getInfoTable($table){
        $query = DB::table($table);
        return $query;
    }

    public function getInfoUsers($rol,$state)
    {
        $query = User::leftJoin('countries','countries.id','=','users.u_id_country')
        ->leftJoin('model_has_roles as roles','roles.model_id','=','users.id')
        ->leftJoin('coins','coins.id','=','users.u_id_money')
        ->where('roles.role_id',$rol)
        ->where('users.u_state',$state);

        return $query;
    }

    public function changeStateRegister($table,$id_user)
    {
        switch ($table) {
            case 'tutors_bank_details':
                $banks = TutorsBanks::where('id_user',$id_user)->get();
                foreach ($banks as $key => $value) {
                   $value->t_b_state = 0;
                   $value->deleted_by = Auth::user()->id;
                   $value->save();
                   $value->delete();
                }
                break;
            case 'language_tutors':
                $langs = TutorLanguage::where('id_user',$id_user)->get();
                foreach ($langs as $key => $value) {
                    $value->l_t_state = 0;
                    $value->deleted_by = Auth::user()->id;
                    $value->save();
                    $value->delete();
                 }
                break;
            case 'tutors_systems':
                $systems = TutorSystem::where('id_user',$id_user)->get();
                foreach ($systems as $key => $value) {
                    $value->t_s_state = 0;
                    $value->deleted_by = Auth::user()->id;
                    $value->save();
                    $value->delete();
                 }
                break;
            case 'tutors_topics':
                $topics = TutorTopic::where('id_user',$id_user)->get();
                foreach ($topics as $key => $value) {
                    $value->t_t_state = 0;
                    $value->deleted_by = Auth::user()->id;
                    $value->save();
                    $value->delete();
                 }
                break;
            case 'tutors_services':
                $services = TutorService::where('id_user',$id_user)->get();
                foreach ($services as $key => $value) {
                    $value->t_s_state = 0;
                    $value->deleted_by = Auth::user()->id;
                    $value->save();
                    $value->delete();
                 }
                break;

            default:
                # code...
                break;
            }
    }
}
