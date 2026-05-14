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
                'image_url' => 'https://m.media-amazon.com/images/I/61i5M7y9SNL._AC_SX466_.jpg',
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
                'image_url' => 'https://srv.latostadora.com/image/sudadera-capucha-negra-hombre--id:34f3837b-b438-4f65-a5a0-eac441af8928;s:H_D1;b:f2f2f2;w:520;tpl:H_D1F;f:f;i:1356238818463135623191.jpg',
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
                'image_url' => 'https://ss327.liverpool.com.mx/xl/1127516304.jpg',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

##Para ejecutar Seeders usar los siguientes comandos:
## winpty docker exec -it comadreja_app bash
##Enseguida una vez dentro del contenedor ejecutar:
## php artisan migrate:fresh --seed
