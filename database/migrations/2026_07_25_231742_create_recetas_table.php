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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('fecha');
            $table->time('hora');
            $table->string('duracion');
            $table->text('diagnostico');
            $table->text('tratamiento');
            $table->decimal('temperatura');
            $table->decimal('peso');
            
            // FK
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('veterinario_id');

            $table->foreign('mascota_id')->references('id')->on('mascotas');
            $table->foreign('veterinario_id')->references('id')->on('veterinarios');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
