<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // 🏬 Store & Delivery Info
            $table->string('order_id')->unique();

            // Connect to users table
            $table->foreignId('merchant_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('booking_operator_id')->nullable()->constrained('users')->nullOnDelete();

            // Connect to stores table
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');

            // 🌱 New Relationships
            $table->foreignId('product_type_id')->constrained('product_types')->onDelete('cascade');
            $table->foreignId('delivery_type_id')->constrained('delivery_types')->onDelete('cascade');

            // 👤 Recipient Details
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('recipient_secondary_phone')->nullable();
            $table->text('recipient_address');

            $table->string('pathao_consignment_ids')->nullable();
            $table->string('courier_status')->nullable();
            $table->string('courier_service')->nullable();
            $table->string('amount_to_collect')->nullable();
            $table->string('item_description')->nullable();

            $table->string('order_amount')->nullable();
            $table->string('total_weight')->nullable();
            $table->string('total_fee')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('cod_fee')->nullable();
            $table->string('delivery_fee')->nullable();
            $table->string('billing_status')->nullable();

            // 🌍 Location Info
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('zone_id');
            $table->unsignedBigInteger('area_id')->nullable();

            $table->string('status')->default('0');
            $table->integer('dispatch_status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
