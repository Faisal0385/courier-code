<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'slug',
        'image',
        'thumb_image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
