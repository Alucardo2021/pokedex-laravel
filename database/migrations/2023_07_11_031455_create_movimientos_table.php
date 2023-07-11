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
        Schema::create('Movimiento', function (Blueprint $table) {
            $table->bigIncrements('MovimientoID');
            $table->string('Nombre');
            $table->text('Descripcion')->nullable();
            $table->unsignedBigInteger('TipoID');

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('TipoID')->references('TipoID')->on('Tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Movimiento');
    }
};
