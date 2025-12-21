<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bin',
        'trade',
        'phone',
        'email',
        'nid',
        'selfie',
        'verify_phone',
        'verify_email',
        'status',
    ];

    /**
     * ✅ Each KYC belongs to a single user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
