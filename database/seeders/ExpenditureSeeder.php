<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenditureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expenditures')->insert([
            [
                'date' => '2024-12-22',
                'description' => 'Pembelian makanan hewan',
                'nominal' => '150000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-12-05',
                'description' => 'Tagihan listrik bulan Desember',
                'nominal' => '450000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-12-22',
                'description' => 'Pembelian mainan hewan',
                'nominal' => '50000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-12-22',
                'description' => 'Perlengkapan kebersihan',
                'nominal' => '80000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-12-22',
                'description' => 'Gaji karyawan',
                'nominal' => '1200000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
