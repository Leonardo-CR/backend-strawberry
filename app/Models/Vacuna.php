<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    protected $table = 'vacunas';

    protected $fillable = [
        'nombre',
        'tipo',
    ];


    // Relacion con el modelo Mascota
    public function mascotas()
    {
        return $this->belongsToMany(Mascota::class,'mascotas_vacunas','vacuna_id','mascota_id');
    }


}
