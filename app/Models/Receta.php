<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = 'recetas';

    protected $fillable = [
      'titulo',
      'fecha',
      'hora',
      'duracion',
      'diagnostico',
      'tratamiento',
      'temperatura',
      'peso',
      'mascota_id',
      'veterinario_id',
    ];

    protected $casts = [
    'temperatura' => 'float',
    'peso' => 'float',
  ];



    //Relacion mascotas
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    //Relacion recetas
    public function veterinario()
    {
      return $this->belongsTo(Veterinario::class);
    }

    
}
