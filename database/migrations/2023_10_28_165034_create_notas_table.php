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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')
            ->constrained('materias')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('estudiante_id')
            ->constrained('estudiantes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('primera_nota');
            $table->integer('segunda_nota');
            $table->integer('tercera_nota');
            $table->integer('definitiva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
