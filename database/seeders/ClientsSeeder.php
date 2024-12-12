<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            ['name' => 'Luis', 'lasname' => 'Pérez', 'indentificationNumber' => '1010101010', 'email' => 'luis.perez@example.com', 'phone' => '3001234567'],
            ['name' => 'Ana', 'lasname' => 'García', 'indentificationNumber' => '2020202020', 'email' => 'ana.garcia@example.com', 'phone' => '3109876543'],
            ['name' => 'Carlos', 'lasname' => 'López', 'indentificationNumber' => '3030303030', 'email' => 'carlos.lopez@example.com', 'phone' => '3202233445'],
            ['name' => 'María', 'lasname' => 'Martínez', 'indentificationNumber' => '4040404040', 'email' => 'maria.martinez@example.com', 'phone' => '3115678901'],
            ['name' => 'Jorge', 'lasname' => 'Hernández', 'indentificationNumber' => '5050505050', 'email' => 'jorge.hernandez@example.com', 'phone' => '3123456789'],
        ]);
        
    }
}

