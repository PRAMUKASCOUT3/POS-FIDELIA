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
                'name' => 'Owner',
                'code' => '12345678',
                'email' => 'owner@gmail.com',
                'password' => Hash::make('password'),
                'isAdmin' => 2
            ],
            [
                'name' => 'Kasir',
                'code' => 'US364726',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('password'),
                'isAdmin' => 0
            ],
        ]);
        \App\Models\User::factory()->count(20)->create();
        $this->call([
            SupplierSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ExpenditureSeeder::class,
        ]); 
    }
}
