<?php namespace app\Traits;

use App\Models\TutorLanguage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use App\Models\TutorsBanks;
use App\Models\TutorService;
use App\Models\TutorSystem;
use App\Models\TutorTopic;
use App\User;
use File;

trait Preregister
{

    public function consultTable($table,$state,$int)
    {
       $id_user = Auth::user()->id;
       $query = DB::table($table)->where('id_user',$id_user)->where($state,$int)->whereNull($table.'.deleted_at')->get()->count();

       return $query;
    }

    public function get_data_table($table,$id = null)
    {
        if ($id) {
            $id_user = $id;
        }else{
            $id_user = Auth::user()->id;
        }
        $query = DB::table($table)->where('id_user',$id_user)->whereNull($table.'.deleted_at');
        return $query;
    }

    public function handle_state($data)
    {
        switch ($data['table']) {
            case 'tutors_bank_details':
                $tutor = TutorsBanks::find($data['id_cuenta']);
                $tutor->update([
                    't_b_state'         => $data['value'],
                    't_b_observations'  => $data['observation']
                ]);
                break;
            case 'language_tutors':
                $tutor = TutorLanguage::find($data['id_cuenta']);
                $tutor->update([
                    'l_t_state'         => $data['value'],
                    'observation'       => $data['observation']
                ]);
                break;
            case 'tutors_systems':
                $tutor = TutorSystem::find($data['id_cuenta']);
                $tutor->update([
                    't_s_state'         => $data['value'],
                    'observation'       => $data['observation']

                ]);
                break;
            case 'tutors_topics':
                $tutor = TutorTopic::find($data['id_cuenta']);
                $tutor->update([
                    't_t_state'         => $data['value'],
                    'observation'       => $data['observation']
                ]);
                break;
            case 'tutors_services':
                $tutor = TutorService::find($data['id_cuenta']);
                $tutor->update([
                    't_s_state'         => $data['value'],
                    'observation'       => $data['observation']
                ]);
                break;

            default:
                # code...
                break;
        }
    }

    public function saveDataAcount($request)
    {
        try {

            if($request->id_acount_bank == 0)
            {
                $register = new TutorsBanks();
            }else{
                $register = TutorsBanks::where('id',$request->id_acount_bank)->first();
            }
            $register->id_user = Auth::user()->id;
            $register->id_bank = $request->id_bank;
            $register->id_type_account = $request->id_type_account;
            $register->t_b_number_account = $request->t_b_number_account;
            $register->t_b_state = 0;
            if($request->id_acount_bank == 0){
            $register->created_by = Auth::user()->id;
            }else{
            $register->updated_by = Auth::user()->id;
            }
            $register->save();

            $id_register = $register->id;



            if($request->hasFile('t_b_namefile')){
                $image_path = public_path() .'\folders\banks'.$register->t_b_namefile;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $file = $request->file('t_b_namefile');
                $name = $file->getClientOriginalName();
                $path = public_path() .'\folders\banks';
                $file->move($path,$name);

                $register->t_b_namefile = $name;
                $register->save();
            }

            return true;

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function saveLanguage($request)
    {
        $data                   = $request->all();
        $data['id_user']        = Auth::user()->id;
        $data['l_t_state']      = User::PENDIENTE;
        $language               = TutorLanguage::updateOrCreate(['id' => $data['id']], $data);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $language->l_t_namefile = $this->saveFile('\folders\languages', $file);
            $language->save();
        }
    }

    public function saveService($request)
    {
        $data                   = $request->all();
        $data['id_user']        = Auth::user()->id;
        $data['t_s_state']      = User::PENDIENTE;
        $servioce               = TutorService::updateOrCreate(['id' => $data['id']], $data);
    }

    public function saveSystem($request)
    {
        $data                   = $request->all();
        $data['id_user']        = Auth::user()->id;
        $data['t_s_state']      = User::PENDIENTE;
        $system                 = TutorSystem::updateOrCreate(['id' => $data['id']], $data);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $system->t_s_namefile = $this->saveFile('\folders\system', $file);
            $system->save();
        }
    }

    public function saveTopic($request)
    {
        $data                   = $request->all();
        $data['id_user']        = Auth::user()->id;
        $data['t_t_state']      = User::PENDIENTE;
        $system                 = TutorTopic::updateOrCreate(['id' => $data['id']], $data);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $system->t_t_namefile = $this->saveFile('\folders\topic', $file);
            $system->save();
        }
    }

    public function saveFile($path, $file){
        $name = $file->getClientOriginalName();
        $path = public_path() .$path;
        $file->move($path, $name);
        return $name;
    }

}
