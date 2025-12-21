<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierStore extends Model
{
    //

    protected $fillable = [
        'user_id',
        'courier_platform_id',
        'client_id',
        'client_secret',
        'username',
        'password',
        'store_id',
        'store_name',
        'token',
        'refresh_token',
        'expires_in',
        'store_token',
    ];
}
