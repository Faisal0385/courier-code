<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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


    /** Store belongs to a courier platform (Pathao, Steadfast, etc.) */
    public function platform(): BelongsTo
    {
        return $this->belongsTo(CourierPlatform::class, 'courier_platform_id');
    }

    /** Store owner (admin / merchant who added the store) */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** Merchants assigned to this courier store */
    public function merchants(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'merchant_couriers',
            'courier_id',
            'merchant_id'
        )->withPivot('id')->withTimestamps();
    }
}
