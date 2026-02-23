<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Import Role and Permission Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Role admin : untuk mengelola ( CRUD ) data
        Role::create(['name' => 'admin']);
        //Role viewer : untuk mengelola ( CRUD ) data
        Role::create(['name' => 'viewer']);
    }
}
