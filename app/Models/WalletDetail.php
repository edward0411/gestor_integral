<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletDetail extends Model
{
    use SoftDeletes;
    protected $table = 'wallet_details';

    protected $fillable = [
        'value',
        'reference',
        'vaucher',
        'observation',
        'wallet_virtual_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // relaciones
    public function walletVirtual() {
        return $this->belongsTo(WalletVirtual::class, 'wallet_virtual_id');
    }
}
