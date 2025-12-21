<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'location',
        'phone',
        'address',
        'status',
    ];

    /**
     * Each hub belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
