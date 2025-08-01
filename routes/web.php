<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;



// Rutas de clientes
Route::prefix('client')->group(function () {
    Route::get('index', [ClientsController::class, 'index'])->name('clients.index');
    //Obtener las mascotas de un usuario 
    Route::get('{user}/pets',[ClientsController::class, 'myPets'])->name('clients.pets');
    Route::post('update/{user}',[ClientsController::class, 'update']);
    Route::delete('destroy/{user}', [ClientsController::class, 'delete'])->name('clients.destroy');
    Route::get('show/{user}',[ClientsController::class,'show'])->name('clients.show');
});

// Rutas para pacientes/mascotas
Route::prefix('pacient')->group(function(){
    Route::get('index',[MascotaController::class,'index'])->name('mascotas.index');
    Route::get('show/{mascota}',[MascotaController::class,'show'])->name('mascotas.show');
    Route::post('store',[MascotaController::class,'store'])->name('mascotas.store');
    Route::post('update/{mascota}',[MascotaController::class,'update'])->name('mascotas.update');
    Route::delete('destroy/{mascota}',[MascotaController::class,'destroy'])->name('mascotas.destroy');
    //Recetas de la mascota
    Route::get('/mascota/{mascota}/recetas/{receta}', [MascotaController::class, 'mostrarReceta']);
});

// Rutas para Recetas 
Route::prefix('prescriptions')->group(function(){
    Route::get('index',[RecetaController::class,'index'])->name('recetas.index');
    Route::get('show/{receta}',[RecetaController::class,'show'])->name('recetas.show');
    Route::post('store',[RecetaController::class,'store'])->name('recetas.store');
    Route::put('update/{receta}',[RecetaController::class,'update'])->name('recetas.update');
});

// Generar todas las rutas de API (nuevo formato ;b)
Route::apiResource('appointments',CitaController::class);
