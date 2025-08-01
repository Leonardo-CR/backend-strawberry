<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MascotaController;

//Rutas públicas
Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::middleware('auth:api')->get('me', [AuthController::class, 'me'])->name('me');
    Route::get('{user}/pets',[ClientsController::class, 'myPets'])->name('clients.pets');
    
});

Route::middleware('auth:api')->group(function () {
    // Rutas protegidas
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('me', [AuthController::class, 'me'])->name('me');

    Route::post('mascota/store',[MascotaController::class,'store'])->name('mascotas.store');

    // Rutas de clientes
    Route::prefix('client')->group(function () {
    Route::get('index', [ClientsController::class, 'index'])->name('clients.index');
    //Obtener las mascotas de un usuario 
    
    Route::post('update/{user}',[ClientsController::class, 'update']);
    Route::delete('destroy/{user}', [ClientsController::class, 'delete'])->name('clients.destroy');
    Route::get('show/{user}',[ClientsController::class,'show'])->name('clients.show');

    Route::get('my-appointments',[CitaController::class, 'misCitas'])->name('recetas.index');

    

    

});


});

