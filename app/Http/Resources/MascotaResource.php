<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MascotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'peso' => $this->peso,
            'raza' => $this->raza,
            'especie_id' => $this->especie->nombre ?? null,
            'cliente_nombre' => $this->clientes->name ?? null,
            // relaciones
            'vacunas' => $this->whenLoaded('vacunas') ? $this->vacunas->map(function($vacuna) {
                return [
                    'id' => $vacuna->id,
                    'nombre' => $vacuna->nombre,
                    'fecha' => $vacuna->pivot->created_at
                    ? Carbon::parse($vacuna->pivot->fecha)->format('d-m-Y')
                        : null,
                ];
            }) : [],

            'recetas' => RecetaResource::collection($this->whenLoaded('recetas')),
        ];
    }
}
