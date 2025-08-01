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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->decimal('peso');
            $table->string('raza');
            $table->string('ruta_imagen')->nullable();

            //FK
            $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('cliente_id');


            $table->foreign('especie_id')->references('id')->on('especies');
            $table->foreign('cliente_id')->references('id')->on('users');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
