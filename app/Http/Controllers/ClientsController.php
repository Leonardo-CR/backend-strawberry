<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\MascotaResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use GuzzleHttp\Client;

class ClientsController extends Controller
{
    public function index()
    {
        //Listado con campos del resource
        return UserResource::collection(User::all());
    }
    //Las mascotas del cliente
    public function myPets(User $user)
    {
        return MascotaResource::collection($user->mascotas()->get());

    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Usuario eliminada correctamente.'
        ], 200);
    }

    public function update(UpdateClientRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        //Respuesta en JSON + codigo 200
        return new UserResource($user);
    }
    public function show(User $user)
    {
        // Cargamos sus mascotas
        $user->load('mascotas');
        return new UserResource($user);
    }
}
