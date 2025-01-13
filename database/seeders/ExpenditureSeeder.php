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
                'date' => '2025-01-01',
                'description' => 'Pembelian makanan hewan',
                'nominal' => '150000',
            ],
            [
                'date' => '2024-01-05',
                'description' => 'Tagihan listrik bulan Desember',
                'nominal' => '450000',
            ],
            [
                'date' => '2025-01-03',
                'description' => 'Pembelian mainan hewan',
                'nominal' => '50000',
            ],
            [
                'date' => '2025-01-04',
                'description' => 'Perlengkapan kebersihan',
                'nominal' => '80000',
            ],
            [
                'date' => '2025-01-05',
                'description' => 'Gaji karyawan',
                'nominal' => '1200000',
            ],
        ]);
    }
}
