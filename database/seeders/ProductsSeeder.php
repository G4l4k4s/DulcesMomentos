<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Pastel de Chocolate', 'description' => 'Pastel húmedo con doble capa de chocolate.', 'price' => 45.99],
            ['name' => 'Cheesecake de Fresa', 'description' => 'Tarta de queso cremosa con fresas frescas.', 'price' => 55.50],
            ['name' => 'Galletas de Chispas de Chocolate', 'description' => 'Galletas crujientes con generosas chispas de chocolate.', 'price' => 12.99],
            ['name' => 'Croissant', 'description' => 'Crujiente y dorado, perfecto para acompañar el café.', 'price' => 8.50],
            ['name' => 'Muffin de Arándanos', 'description' => 'Muffin esponjoso con trozos de arándanos naturales.', 'price' => 18.75],
            ['name' => 'Tarta de Limón', 'description' => 'Tarta dulce y ácida con crema de limón.', 'price' => 28.99],
            ['name' => 'Cupcakes de Vainilla', 'description' => 'Cupcakes suaves decorados con crema de mantequilla.', 'price' => 14.30],
            ['name' => 'Brownie', 'description' => 'Brownie clásico con nueces.', 'price' => 20.00],
            ['name' => 'Panqué de Plátano', 'description' => 'Panqué casero con trozos de plátano.', 'price' => 22.50],
            ['name' => 'Milhojas', 'description' => 'Postre con capas de hojaldre y crema pastelera.', 'price' => 30.00],
        ]);
    }
}

