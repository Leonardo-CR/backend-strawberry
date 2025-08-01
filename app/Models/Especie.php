<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table = 'especies';

    protected $fillable = [
        'nombre',
    ];

    //Relacion con Mascota
    public function mascota()
    {
        return $this->hasMany(Mascota::class, 'especie_id');
    }
}
