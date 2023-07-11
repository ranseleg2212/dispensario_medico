<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->string('diagnostico');
            $table->string('tratamiento');
            $table->string('pruebas')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->string('presion')->nullable();
            $table->integer('saturacion')->nullable();
            $table->string('peso')->nullable();
            $table->string('auscultacion')->nullable();
            $table->string('temperatura')->nullable();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }

};
