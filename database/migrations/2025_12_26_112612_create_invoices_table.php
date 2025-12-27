<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            // Order Identifiers
            $table->string('order_id')->index();
            $table->string('merchant_id');
            $table->string('order_consignment_id')->nullable();
            $table->string('merchant_order_id')->nullable();

            // Order Info
            $table->timestamp('order_created_at')->nullable();
            $table->text('order_description')->nullable();
            $table->string('order_status')->nullable();
            $table->timestamp('order_status_updated_at')->nullable();

            // Recipient Info
            $table->string('recipient_name');
            $table->text('recipient_address');
            $table->string('recipient_phone', 20);
            $table->string('recipient_secondary_phone', 20)->nullable();

            // Location
            $table->unsignedBigInteger('customer_city_id')->nullable();
            $table->unsignedBigInteger('customer_zone_id')->nullable();
            $table->unsignedBigInteger('customer_area_id')->nullable();
            $table->string('city_name')->nullable();
            $table->string('zone_name')->nullable();
            $table->string('area_name')->nullable();

            // Financials
            $table->decimal('order_amount', 10, 2)->default(0);
            $table->decimal('total_fee', 10, 2)->default(0);
            $table->decimal('promo_discount', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('cod_fee', 10, 2)->default(0);
            $table->decimal('additional_charge', 10, 2)->default(0);
            $table->decimal('compensation_cost', 10, 2)->default(0);
            $table->decimal('delivery_fee', 10, 2)->default(0);

            // Delivery Info
            $table->integer('delivery_type')->nullable();
            $table->integer('total_weight')->default(0);
            $table->string('cash_on_delivery', 10)->nullable();
            $table->unsignedBigInteger('order_delivery_hub_id')->nullable();
            $table->string('delivery_string')->nullable();
            $table->integer('delivery_method')->default(0);
            $table->integer('pickup_method')->default(0);
            $table->string('pickup_string')->nullable();

            // Store Info
            $table->string('store_name')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();

            // Item Info
            $table->string('order_type')->nullable();
            $table->string('item_type')->nullable();
            $table->unsignedTinyInteger('order_type_id')->nullable();
            $table->unsignedTinyInteger('item_type_id')->nullable();
            $table->integer('item_quantity')->default(1);
            $table->text('item_description')->nullable();
            $table->string('color')->nullable();

            // Status & Notes
            $table->string('billing_status')->default('Unpaid');
            $table->text('modification_notes')->nullable();
            $table->text('failed_reason')->nullable();
            $table->text('delivery_instruction')->nullable();
            $table->boolean('is_incomplete')->default(false);

            // Flags
            $table->boolean('is_recipient_flagged')->default(false);
            $table->boolean('is_point_delivery')->default(false);
            $table->boolean('can_place_execution_request')->default(false);

            // Extra
            $table->string('short_link')->nullable();
            $table->string('ticket_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('delivery_slip')->nullable();
            $table->string('execution_request_type')->nullable();
            $table->timestamp('sorted_at')->nullable();

            // JSON
            $table->json('contact_collectable_amount_update_status')->nullable();
            $table->json('c2c_info')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
