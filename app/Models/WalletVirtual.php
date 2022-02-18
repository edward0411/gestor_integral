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
}
