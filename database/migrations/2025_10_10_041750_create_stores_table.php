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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            $table->string('merchant_id');
            $table->string('store_admin_id')->nullable();
            $table->string('name')->unique();
            $table->string('email')->nullable(); // store email
            $table->string('owner_phone')->nullable(); // store contact
            $table->string('primary_phone')->nullable(); // store contact
            $table->text('address')->nullable(); // store address
            $table->string('logo')->nullable();  // store logo

            $table->string('city')->nullable();  // store city
            $table->string('zone')->nullable();  // store zone
            $table->string('area')->nullable();  // store area

            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
