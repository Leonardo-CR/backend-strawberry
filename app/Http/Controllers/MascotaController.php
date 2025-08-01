<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use App\Http\Resources\MascotaResource;
use App\Http\Resources\RecetaResource;
use App\Models\Mascota;
use App\Models\Receta;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    //Lista de pacientes
    public function index()
    {
        return MascotaResource::collection(Mascota::with('clientes','especie')->get());
    }

    //Crear Paciente
    public function store(StoreMascotaRequest $request)
    {
        //validacion usando el request
        $data = $request->validated();
        $mascota = Mascota::create($data);
        // Respuesta JSON con el recurso, código 201 (creado)
        return new MascotaResource($mascota);
    }
    //Editar Paciente
    public function update(StoreMascotaRequest $request, Mascota $mascota)
    {
        $data = $request->validated();
        $mascota->update($data);
        //Respuesta en JSON + codigo 200
        return new MascotaResource($mascota);
    }
    //Mostrar paciente
    public function show(Mascota $mascota)
    {
        $mascota->load('vacunas', 'recetas'); // Carga las relaciones
        // Retornar la mascota como recurso 200 || !404
        return new MascotaResource($mascota);
    }
    //eliminar paciente
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return response()->json([
            'message' => 'Mascota eliminada correctamente.'
        ], 200);
    }
    //buscar receta de una mascota
    public function mostrarReceta(Mascota $mascota, $recetaId)
    {
        $receta = $mascota->recetas()->with('veterinario')->find($recetaId);

        if (!$receta) {
            return response()->json(['error' => 'Receta no encontrada para esta mascota.'], 404);
        }

        return new RecetaResource($receta);
    }


}
