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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');

            //FK
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('veterinario_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('mascota_id')->references('id')->on('mascotas');
            $table->foreign('veterinario_id')->references('id')->on('veterinarios');
            $table->foreign('user_id')->references('id')->on('users');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
