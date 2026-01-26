<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantCourier extends Model
{
    protected $fillable = [
        'merchant_id',
        'courier_id',
    ];

    public function merchant()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }

    public function courier()
    {
        return $this->belongsTo(CourierStore::class, 'courier_id');
    }

    
}
