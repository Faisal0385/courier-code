<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'product_id',
        'type',
        'qty',
        'notes',
    ];

    /**
     * Relationship: Each stock movement belongs to a product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
