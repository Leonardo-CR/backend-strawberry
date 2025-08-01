<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //En este Seeder pondremos la data Base para nuestra aplicacion

        // Data para la tabla especies
        DB::table('especies')->insert([
            [
                'nombre' => 'Ave'
            ],
            [
                'nombre' => 'Canino'
            ],
            [
                'nombre' => 'Felino'
            ],
        ]);
        // Data para las vacunas
        DB::table('vacunas')->insert([
            [
                'nombre' => 'Puppy DP',
                'descripcion' => 'Moquillo y parvovirus'
            ],
            [
                'nombre' => 'Rabia',
                'descripcion' => 'Rabia'
            ],
            [
                'nombre' => 'Coronavirus canino',
                'descripcion' => 'Gastroenteritis viral'
            ],
            [
                'nombre' => 'Bordetella',
                'descripcion' => 'Tos de las perreras'
            ],
        ]);
        // Data para los veterinarios
        DB::table('veterinarios')->insert([
            [
                'nombre' => 'Juan Perez Ochoa',
                'email' => 'juan.po@gmail.com',
                'password' => bcrypt('password'),
                'lada' => '+52',
                'numero' => '2292219877',
            ],
            [
                'nombre' => 'Juana Flores Cruz',
                'email' => 'juana.fc@gmail.com',
                'password' => bcrypt('password'),
                'lada' => '+52',
                'numero' => '2293319447',
            ],
        ]);
        // Data para clientes (dueños de las mascotas)
        DB::table('users')->insert([
            [
                'name' => 'Leonardo Daniel Cruz Rosas',
                'email' => 'leonardo.rosas041024@gmail.com',
                'password' => bcrypt('password'),   
            ],
            [
                'name' => 'Juan Perez Mendez',
                'email' => 'juan.pm@gmail.com',
                'password' => bcrypt('password'),   
            ],
            [
                'name' => 'Daniel Mendez Lopez',
                'email' => 'dani1988@gmail.com',
                'password' => bcrypt('password'),   
            ],
            
        ]);
        // Data para mascotas
        DB::table('mascotas')->insert([
            [
                'nombre' => 'Croqueta',
                'ruta_imagen' => 'no-image',
                'fecha_nacimiento' => '2024-11-11',
                'peso' => 3.4,
                'raza' => 'Desconocida',
                'especie_id' => 2,
                'cliente_id' => 1,
            ], 
            [
                'nombre' => 'Niña',
                'ruta_imagen' => 'no-image',
                'fecha_nacimiento' => '2024-11-11',
                'peso' => 3.4,
                'raza' => 'Desconocida',
                'especie_id' => 2,
                'cliente_id' => 1,
            ], 
        ]);
        // Data para recetas medicas para mascotas
        DB::table('recetas')->insert([
            [
                'titulo' => 'Infección Estomacal',
                'fecha' => '2025-07-25',
                'hora' => '10:30:00',
                'duracion' => '30 minutos',
                'diagnostico' => 'Infección leve',
                'tratamiento' => 'Antibiótico durante 5 días',
                'temperatura' => 38.5,
                'peso' => 4.2,
                'mascota_id' => 1,
                'veterinario_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Infección Renal',
                'fecha' => '2025-07-20',
                'hora' => '12:00:00',
                'duracion' => '45 minutos',
                'diagnostico' => 'Dolor estomacal',
                'tratamiento' => 'Dieta blanda por 3 días',
                'temperatura' => 39.0,
                'peso' => 4.0,
                'mascota_id' => 1,
                'veterinario_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Moquillo',
                'fecha' => '2025-07-15',
                'hora' => '09:15:00',
                'duracion' => '20 minutos',
                'diagnostico' => 'Vacunación general',
                'tratamiento' => 'Aplicación de vacuna antirrábica',
                'temperatura' => 37.8,
                'peso' => 3.9,
                'mascota_id' => 1,
                'veterinario_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // Data para citas
        DB::table('citas')->insert([
            [
                'fecha' => '2025-07-25',
                'hora' => '10:00:00',
                'mascota_id' => 1,
                'user_id' => 1,
                'veterinario_id' => 1,
            ],
            [
                'fecha' => '2025-07-26',
                'hora' => '12:30:00',
                'mascota_id' => 1,
                'user_id' => 1,
                'veterinario_id' => 1,
            ],
            [
                'fecha' => '2025-07-27',
                'hora' => '15:00:00',
                'mascota_id' => 1,
                'user_id' => 1,
                'veterinario_id' => 1,
            ],
        ]);
        DB::table('mascotas_vacunas')->insert([
            [
                'mascota_id' => 1,
                'vacuna_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mascota_id' => 1,
                'vacuna_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mascota_id' => 1,
                'vacuna_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
