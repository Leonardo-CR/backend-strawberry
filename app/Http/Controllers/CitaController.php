<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCitaRequest;
use App\Http\Resources\CitaResource;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Retornar Listado de Todas Las Citas
        return CitaResource::collection(Cita::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitaRequest $request)
    {
        $data = $request->validated();

        $cita = Cita::create($data);

        return response()->json([
            'message' => 'Cita creada correctamente',
            'data' => $cita,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }
    // citas del usuario autenticado 
    public function misCitas()
    {
        $usuario = Auth::user(); // Obtener usuario autenticado vía JWT

        $citas = Cita::where('user_id', $usuario->id)
                    ->orderBy('fecha', 'desc')
                    ->orderBy('hora', 'desc')
                    ->get();

        return CitaResource::collection($citas);
    }
    //obtener las citas por usuario usando el id ;b
    public function citasPorUsuario($id)
    {
        $citas = Cita::with(['mascota', 'veterinario'])
            ->whereHas('mascota', fn($query) => $query->where('cliente_id', $id))
            ->get()
            ->map(fn($cita) => [
                'fecha' => $cita->fecha,
                'hora' => $cita->hora,
                'mascota_id' => $cita->mascota_id,
                'mascota_nombre' => optional($cita->mascota)->nombre,
                'veterinario_id' => $cita->veterinario_id,
                'veterinario_nombre' => optional($cita->veterinario)->nombre,
            ]);

        return response()->json(['data' => $citas]);
    }



}
