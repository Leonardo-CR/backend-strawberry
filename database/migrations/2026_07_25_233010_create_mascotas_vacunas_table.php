<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //Tabla intermedia
    {
        Schema::create('mascotas_vacunas', function (Blueprint $table) {
            $table->id();
            // FK
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('vacuna_id');

            $table->foreign('mascota_id')->references('id')->on('mascotas');
            $table->foreign('vacuna_id')->references('id')->on('vacunas');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas_vacunas');
    }
};
