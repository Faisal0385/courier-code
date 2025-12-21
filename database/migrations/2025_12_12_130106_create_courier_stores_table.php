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
        Schema::create('courier_stores', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('courier_platform_id')
                ->constrained('courier_platforms')
                ->onDelete('cascade');

            // Pathao API credentials
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->string('username')->comment('username/email')->nullable();
            $table->string('password')->nullable();
            $table->string('store_id')->nullable();
            $table->string('store_name')->nullable();

            // Tokens
            $table->text('token')->nullable();
            $table->text('refresh_token')->nullable();
            $table->string('expires_in')->nullable();

            $table->string('store_token')->comment("For site to connect store with users.");

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_stores');
    }
};
