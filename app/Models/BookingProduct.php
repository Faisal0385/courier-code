<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingProduct extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'product_id',
        'weight',
        'quantity',
        'amount',
        'description_price',
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
