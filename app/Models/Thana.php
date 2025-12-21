<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'slug',
        'status',
    ];

    /**
     * Each thana belongs to a district.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
