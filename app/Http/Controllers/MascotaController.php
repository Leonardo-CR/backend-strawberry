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
    public function store(Request $request)
{
    $user = auth('api')->user();

    // Contar mascotas registradas por este usuario
    $cantidadMascotas = Mascota::where('cliente_id', $user->id)->count();

    // Validar límite de 3 mascotas
    if ($cantidadMascotas >= 3) {
        return response()->json([
            'message' => 'Has alcanzado el límite máximo de 3 mascotas.'
        ], 403);
    }

    // Validar datos recibidos
    $validated = $request->validate([
        'nombre' => 'required|string',
        'fecha_nacimiento' => 'required|date',
        'peso' => 'required|numeric',
        'raza' => 'nullable|string',
        'especie_id' => 'required|exists:especies,id',
    ]);

    // Asignar cliente_id desde usuario autenticado
    $validated['cliente_id'] = $user->id;

    $mascota = Mascota::create($validated);

    return response()->json([
        'message' => 'Mascota registrada correctamente',
        'data' => $mascota,
    ], 201);
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
