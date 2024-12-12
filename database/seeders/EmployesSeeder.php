<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployesSeeder extends Seeder
{
    public function run()
    {
        DB::table('employes')->insert([
            ['name' => 'Laura Gómez', 'email' => 'laura.gomez@bakery.com', 'cargo' => 'Panadero/a'],
            ['name' => 'Pedro Martínez', 'email' => 'pedro.martinez@bakery.com', 'cargo' => 'Decorador/a'],
            ['name' => 'Ana López', 'email' => 'ana.lopez@bakery.com', 'cargo' => 'Encargado/a de ventas'],
            ['name' => 'Jorge Hernández', 'email' => 'jorge.hernandez@bakery.com', 'cargo' => 'Repartidor/a'],
            ['name' => 'Carla Fernández', 'email' => 'carla.fernandez@bakery.com', 'cargo' => 'Administrador/a'],
        ]);
    }
}

