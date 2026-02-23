<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suplier::create([
            'nama_supliers' => 'Indofood',
            'city'         => 'Jakarta Pusat',
            'region'       => 'DKI Jakarta',
            'address'      => 'Jl. Panglima Sudirman'
        ]);
        $suplier2 = suplier::create([
            'nama_supliers' => 'PT Mekar',
            'city'         => 'Surabaya',
            'region'       => 'Jawa Timur',
        ]);
    }
}
