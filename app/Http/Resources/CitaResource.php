<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CitaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'mascota_id' => $this->mascota_id,
            'mascota_nombre' => $this->mascota->nombre,
            'veterinario_id' => $this->veterinario_id,
            'veterinario_nombre' => $this->veterinario->nombre,
        ];
    }
}
