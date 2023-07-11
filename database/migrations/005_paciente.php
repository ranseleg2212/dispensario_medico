<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellido');
        $table->string('identificacion')->unique();
        $table->date('fecha_nacimiento');
        $table->string('genero');
        $table->string('direccion');
        $table->string('telefono');
        $table->string('email');
        $table->string('alergias')->nullable();
        $table->string('condiciones')->nullable();
        $table->timestamps();
        $table->string('antecedentes_fam')->nullable();
        $table->string('alcohol')->default('no');
        $table->string('tabaco')->default('no');
        $table->string('drogas')->default('no');
        $table->string('infusiones')->default('no');
        $table->string('comentario')->nullable();
        $table->integer('edad')->nullable();
        $table->string('ocupacion')->nullable();
    });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::dropIfExists('pacientes');
}

};
