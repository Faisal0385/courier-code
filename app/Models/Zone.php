<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'city_id',
        'zone_id',
        'zone_name'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function areas()
    {
        return $this->hasMany(Area::class, 'zone_id', 'zone_id');
    }
}
