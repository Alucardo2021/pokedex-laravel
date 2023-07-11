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
        Schema::create('PokemonTipo', function (Blueprint $table) {
            $table->bigIncrements('PokemonTipoID');
            $table->unsignedBigInteger('TipoID');
            $table->unsignedBigInteger('PokemonID');
            $table->timestamps();
            $table->foreign('TipoID')->references('TipoID')->on('Tipo');
            $table->foreign('PokemonID')->references('PokemonID')->on('Pokemon');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PokemonTipo');
    }
};
