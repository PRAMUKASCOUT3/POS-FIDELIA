<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'Pet Supplies Jambi',
                'contact_person' => '0812-3456-7890',
                'address' => 'Jl. Jenderal Sudirman No.12',
            ],
            [
                'name' => 'Jambi Pet Warehouse',
                'contact_person' => '0813-9876-5432',
                'address' => 'Jl. Gatot Subroto No.34',
            ],
            [
                'name' => 'Best Pet Shop Supplier',
                'contact_person' => '0812-2233-4455',
                'address' => 'Jl. Kolonel Abunjani No.56',
            ],
            [
                'name' => 'Paws & Tails Jambi',
                'contact_person' => '0819-5567-8890',
                'address' => 'Jl. Pattimura No.20',
            ],
            [
                'name' => 'Happy Pet Mart',
                'contact_person' => '0812-4444-7890',
                'address' => 'Jl. M. Yamin No.7',
            ],
            [
                'name' => 'Fur Friends Supplies',
                'contact_person' => '0813-6666-0000',
                'address' => 'Jl. Sultan Thaha No.14',
            ],
            [
                'name' => 'Tropical Pet Supplies',
                'contact_person' => '0819-3344-5567',
                'address' => 'Jl. Dr. Sutomo No.28',
            ],
            [
                'name' => 'Pet Lovers Jambi',
                'contact_person' => '0822-3345-7766',
                'address' => 'Jl. HOS Cokroaminoto No.15',
            ],
            [
                'name' => 'Animal Care Distributor',
                'contact_person' => '0821-5678-3456',
                'address' => 'Jl. Ahmad Yani No.33',
            ],
            [
                'name' => 'Kucing & Anjing Center',
                'contact_person' => '0823-9987-1234',
                'address' => 'Jl. Zainir Havis No.10',
            ],
        ]);
    }
}
