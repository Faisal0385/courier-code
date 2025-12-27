<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [

        // Order Identifiers
        'order_id',
        'merchant_id',
        'order_consignment_id',
        'merchant_order_id',

        // Order Info
        'order_created_at',
        'order_description',
        'order_status',
        'order_status_updated_at',

        // Recipient Info
        'recipient_name',
        'recipient_address',
        'recipient_phone',
        'recipient_secondary_phone',

        // Location
        'customer_city_id',
        'customer_zone_id',
        'customer_area_id',
        'city_name',
        'zone_name',
        'area_name',

        // Financials
        'order_amount',
        'total_fee',
        'promo_discount',
        'discount',
        'cod_fee',
        'additional_charge',
        'compensation_cost',
        'delivery_fee',

        // Delivery Info
        'delivery_type',
        'total_weight',
        'cash_on_delivery',
        'order_delivery_hub_id',
        'delivery_string',
        'delivery_method',
        'pickup_method',
        'pickup_string',

        // Store Info
        'store_name',
        'store_id',

        // Item Info
        'order_type',
        'item_type',
        'order_type_id',
        'item_type_id',
        'item_quantity',
        'item_description',
        'color',

        // Status & Notes
        'billing_status',
        'modification_notes',
        'failed_reason',
        'delivery_instruction',
        'is_incomplete',

        // Flags
        'is_recipient_flagged',
        'is_point_delivery',
        'can_place_execution_request',

        // Extra
        'short_link',
        'ticket_id',
        'invoice_id',
        'delivery_slip',
        'execution_request_type',
        'sorted_at',

        // JSON
        'contact_collectable_amount_update_status',
        'c2c_info',
    ];

    protected $casts = [
        'order_created_at' => 'datetime',
        'order_status_updated_at' => 'datetime',
        'sorted_at' => 'datetime',

        'is_incomplete' => 'boolean',
        'is_recipient_flagged' => 'boolean',
        'is_point_delivery' => 'boolean',
        'can_place_execution_request' => 'boolean',

        'contact_collectable_amount_update_status' => 'array',
        'c2c_info' => 'array',
    ];
}
