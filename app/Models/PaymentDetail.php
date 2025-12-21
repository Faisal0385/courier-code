<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bkash',
        'nagod',
        'branch_name',
        'bank_account',
        'bank_name',
        'account_holder',
        'account_no',
    ];

    /**
     * ✅ Each payment detail belongs to a single user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
