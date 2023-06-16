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
        Schema::create('coingeckos', function (Blueprint $table) {
            $table->id();
            $table->string('coingeckoid')->nullable();
            $table->string('symbol')->nullable();
            $table->string('name')->nullable();
            $table->json('platforms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coingeckos');
    }
};
