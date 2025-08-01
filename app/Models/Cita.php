<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
        'fecha',
        'hora',
        'mascota_id',
        'user_id',
        'veterinario_id',
    ];
    //Casteo de datos ;b
    // protected $casts = [
    //     'fecha' => 'date',
    //     'hora' => 'datetime:H:i',
    // ];

    // App\Models\Cita.php
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relacion mascotas
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
    //Relacion recetas
    public function veterinario()
    {
      return $this->belongsTo(Veterinario::class, 'veterinario_id');
    }
}
