<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedBigInteger('historial_id');
            $table->string('comentario');
            $table->string('resultado');
            $table->string('diagnostico_definitivo');
            $table->timestamps();

            $table->foreign('historial_id')->references('id')->on('historials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }

};
