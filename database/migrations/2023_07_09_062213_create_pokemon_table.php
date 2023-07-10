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
        Schema::create('Pokemon', function (Blueprint $table) {
            $table->bigIncrements('PokemonID');
            $table->string('Nombre');
            $table->string('Peso');
            $table->string('Altura');
            $table->string('SpriteComun');
            $table->string('SpriteShiny');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pokemon');
    }
};
