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
        Schema::create('PokemonHabilidad', function (Blueprint $table) {
            $table->bigIncrements('PokemonHabilidadID');
            $table->unsignedBigInteger('HabilidadID');
            $table->unsignedBigInteger('PokemonID');
            $table->timestamps();
            $table->foreign('HabilidadID')->references('HabilidadID')->on('Habilidad');
            $table->foreign('PokemonID')->references('PokemonID')->on('Pokemon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PokemonHabilidad');
    }
};
