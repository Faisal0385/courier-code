<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'zone_id',
        'area_id',
        'area_name'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id', 'zone_id');
    }
}
