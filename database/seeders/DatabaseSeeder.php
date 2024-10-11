<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'code' => '12345678',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'isAdmin' => 1
            ],
            [
                'name' => 'User',
                'code' => '12345678',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'isAdmin' => 0
            ],
        ]);
        \App\Models\User::factory()->count(20)->create(); 
    }
}
