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
        Schema::create('areas', function (Blueprint $table) {
            $table->id(); // local primary key
            $table->integer('zone_id'); // external zone id
            $table->integer('area_id')->unique(); // external area id
            $table->string('area_name');
            $table->timestamps();

            // indexing for fast zone lookup
            $table->index('zone_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
