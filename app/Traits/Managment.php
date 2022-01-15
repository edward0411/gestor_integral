<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Parametrics;
use App\Models\Countries as countries;
use App\Models\Areas as areas;
use App\Models\Subjects;
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

    public function getInfoAreas(){

        $areas = areas::select('id','a_name');
        return $areas;
    }

   public function getInfoSubjects(){

        $subjects = subjects::leftJoin('areas','areas.id','=','subjects.id_area')
        ->select('subjects.*');
        return $subjects;

    }


}
