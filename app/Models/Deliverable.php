<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliverable extends Model
{
    use SoftDeletes;
    protected $table = 'deliverables';

    protected $fillable = [
        'date_delivery',
        'status',
        'status_deliverable',
        'file',
        'work_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // relaciones
    public function work() {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function qualificate() {
        return $this->hasOne(Deliverable_qualificates::class, 'id_deliverable');
    }

    // Accessor
    public function getStateAttribute()
    {
        $name = null;
        switch ($this->status) {
            case 1:
               $name = 'ENTREGABLE CARGADO';
                break;
            case 2:
               $name = 'ENTREGABLE DESCARGABLE';
                break;
            default:
               $name = $this->status;
               break;
        }
        return $name;
    }

    public function getStateAcountAttribute()
    {
        $name = null;
        switch ($this->status_cb) {
            case 0:
               $name = 'PTE VALIDACIÓN';
                break;
            case 1:
               $name = 'CUENTA VALIDADA';
                break;
            default:
               $name = $this->status;
               break;
        }
        return $name;
    }

    public function getStateDeliverableAttribute()
    {
        $name = null;
        switch ($this->status_deliverable) {
            case 1:
               $name = 'ENTREGABLE PENDIENTE APROBACIÓN';
                break;
            case 2:
               $name = 'ENTREGABLE APROBADO';
                break;
            case 3:
                $name = 'ENTREGABLE RECHAZADO';
                break;
            default:
               $name = $this->status_deliverable;
               break;
        }
        return $name;
    }
}
