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
        Schema::create('booking_products', function (Blueprint $table) {
            $table->id();

            // Foreign key to bookings table
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('bookings')
                ->onDelete('cascade');

            // Foreign key to products table
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            // Additional columns
            $table->decimal('weight', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('description_price', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_products');
    }
};
