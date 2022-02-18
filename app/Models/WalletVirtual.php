<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletVirtual extends Model
{
    use SoftDeletes;
    protected $table = 'wallet_virtual';

    protected $fillable = [
        'status',
        'work_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // relaciones
    public function work() {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function walletDetails() {
        return $this->hasMany(WalletDetail::class, 'wallet_virtual_id');
    }

    // Accessor
    public function getValueAttribute()//calcular el valor del pago
    {
        $total = 0;
        foreach ($this->walletDetails as $walletDetail) {
            $total = $total + $walletDetail->value;
        }
        return $total;
    }

    public function getBalanceAttribute()//calcular el saldo total
    {
        return $this->work->requestQuote->requestQuoteTutor->value - $this->value;
    }

    public function getStateAttribute()
    {
        $name = null;
        switch ($this->status) {
            case 1:
               $name = 'PENDIENTE DE PAGO';
                break;
            case 2:
               $name = 'PAGADA';
                break;
            default:
               $name = $this->status;
               break;
        }
        return $name;
    }
}
