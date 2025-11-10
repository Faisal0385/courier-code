<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'merchant_id',
        'booking_operator_id',
        'store_id',
        'product_type',
        'delivery_type',
        'recipient_name',
        'recipient_phone',
        'recipient_secondary_phone',
        'recipient_address',
        'division_id',
        'district_id',
        'thana_id',
        'status',
    ];

    // Merchant who created the booking
    public function merchant()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }

    // Booking operator assigned
    public function bookingOperator()
    {
        return $this->belongsTo(User::class, 'booking_operator_id');
    }

    // The store associated with the booking
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    // Products associated with this booking
    public function products()
    {
        return $this->hasMany(BookingProduct::class, 'order_id');
    }

    // Location relationships (if needed)
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }
}
