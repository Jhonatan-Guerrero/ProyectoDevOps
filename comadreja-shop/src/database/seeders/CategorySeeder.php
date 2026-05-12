<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Tecnología',
                'description' => 'Productos tecnológicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ropa',
                'description' => 'Prendas y accesorios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hogar',
                'description' => 'Artículos para el hogar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
