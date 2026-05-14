<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         $this->call([
        UserSeeder::class,
        CategorySeeder::class,
        ProductSeeder::class,
        ]);
    }
}

##Para ejecutar Seeders usar los siguientes comandos:
## winpty docker exec -it comadreja_app bash
##Enseguida una vez dentro del contenedor ejecutar:
## php artisan migrate:fresh --seed
