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
    DB::table('categories')-> insert([
        'slug'=> 'makanan-kekinian',
        'category'=> 'makanan kekinian',
        'created_at' =>now(),
        'updated_at' =>now(),
    ]);
    }
}
