<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use App\Http\Requests\StoreRecetaRequest;
use App\Http\Resources\MascotaResource;
use App\Http\Resources\RecetaResource;
use App\Models\Mascota;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RecetaResource::collection(Receta::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecetaRequest $request)
    {
        //Validacion
        $data = $request->validated();
        //Crear Registro
        $mascota = Receta::create($data);
        //Retornar
        return new RecetaResource($mascota);
    }
    /**
     * Display the specified resource.
     */
    public function show(Receta $receta)
    {
        return new RecetaResource($receta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMascotaRequest $request, Receta $receta)
    {
        //validar
        $data = $request->validated();
        //actualizar
        $receta->update($data);
        //retornamos el recurso con 200 ok
        return $receta;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        $receta->delete();
        return response('Se elimino la receta',200);
    }
}
