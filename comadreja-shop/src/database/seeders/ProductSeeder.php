<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'name' => 'Laptop Gamer',
                'description' => 'Laptop de alto rendimiento',
                'price' => 25000.00,
                'stock' => 5,
                'image_url' => 'https://www.amazon.com/-/es/asus-Laptop-Gamer-ROG-Strix/dp/B0CBNY3MRJ',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'name' => 'Sudadera Negra',
                'description' => 'Sudadera cómoda y moderna',
                'price' => 799.99,
                'stock' => 20,
                'image_url' => 'https://www.latostadora.com/web/sudadera-capucha-negra-hombre/8818463',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 3,
                'name' => 'Silla de Oficina',
                'description' => 'Silla ergonómica',
                'price' => 3200.00,
                'stock' => 8,
                'image_url' => 'https://www.liverpool.com.mx/tienda/pdp/silla-de-escritorio-x-pross/9947073060',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}