<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Salotos',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Sriubos',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Desertai',
            'is_active' => true,
        ]);
    }
}
