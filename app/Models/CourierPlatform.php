<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourierPlatform extends Model
{
    use HasFactory;

    const COURIER_PLATFORM_PATHAO = 'Pathao';
    const COURIER_PLATFORM_PATHAO_VALUE = 'pathao';
    const COURIER_PLATFORM_STEADFAST = 'Steadfast';
    const COURIER_PLATFORM_STEADFAST_VALUE = 'steadfast';

    protected $fillable = [
        'name',
        'value',
        'logo',
        'status',
    ];

    public function getRouteKeyName()
    {
        return 'value';
    }

    public function stores(): HasMany
    {
        return $this->hasMany(CourierStore::class);
    }
}
