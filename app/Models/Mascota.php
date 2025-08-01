<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'peso',
        'raza',
        'especie_id',
        'cliente_id'
    ];

    //Casteo de datos ;b
    // protected $casts = [
    //     'fecha_nacimiento' => 'date',
    //     'peso' => 'float',
    // ];

    //Relacion para saber que mascota pertenece a que cliente
    public function clientes()
    {
        return $this->belongsTo(User::class,'mascota_id');
    }
    //Relacion para saber las vacunas de un cliente
    public function vacunas()
    {
        return $this->belongsToMany(Vacuna::class,'mascotas_vacunas','mascota_id','vacuna_id')
            ->withTimestamps();;
    }
    public function recetas()
    {
        return $this->hasMany(Receta::class,'mascota_id');
    }

    //Relacion con recetas
    public function mascota()
    {
    return $this->belongsTo(Mascota::class, 'mascota_id');
    }
    //Relacion con citas 
    public function citas()
    {
        return $this->hasMany(Cita::class,'mascota_id');
    }
    //Relacion con especie
    public function especie()
    {
        return $this->belongsTo(Especie::class,'especie_id');
    }
}
