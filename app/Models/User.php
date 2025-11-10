<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'image',
        'nid',
        'role',
        'user_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // public function bookingOperators()
    // {
    //     return $this->hasMany(BookingOperator::class);
    // }


    public function store()
    {
        return $this->hasMany(Store::class);
    }

    /**
     * A user can have many hubs.
     */
    public function hubs()
    {
        return $this->hasMany(Hub::class, 'user_id');
    }


    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    // ✅ Define the inverse relation
    public function kyc()
    {
        return $this->hasOne(Kyc::class);
    }

    // ✅ One-to-One relationship with PaymentDetail
    public function paymentDetail()
    {
        return $this->hasOne(PaymentDetail::class);
    }
}
