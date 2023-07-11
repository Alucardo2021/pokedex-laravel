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
        Schema::create('PokemonMovimiento', function (Blueprint $table) {
            $table->bigIncrements('PokemonMovimientoID');
            $table->unsignedBigInteger('MovimientoID');
            $table->unsignedBigInteger('PokemonID');
            $table->timestamps();
            $table->foreign('MovimientoID')->references('MovimientoID')->on('Movimiento');
            $table->foreign('PokemonID')->references('PokemonID')->on('Pokemon');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PokemonMovimiento');
    }
};
