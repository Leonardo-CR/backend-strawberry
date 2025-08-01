<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    protected $table = 'veterinarios';
    
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'lada',
        'numero',
    ];
    //Relacion de recetas 1:n
    public function recetas()
    {
        return $this->hasMany(Receta::class,'receta_id');
    }
}
