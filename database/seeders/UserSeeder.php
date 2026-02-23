<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat user role admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        $admin->assignRole('admin');
        
        // membuat user role viewer
        $viewer = User::create([
            'name' => 'Viewer',
            'email' => 'viewer@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    $viewer->assignRole('viewer');
    }
}