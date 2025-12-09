<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name'    => 'Budi Santoso',
                'status'  => 'member',
                'email'   => 'budi.santoso@example.com',
                'phone'   => '081234567890',
                'address' => 'Jl. Melati No. 22, Jakarta Selatan',
            ],
            [
                'name'    => 'Siti Aminah',
                'status'  => 'non member',
                'email'   => 'siti.aminah@example.com',
                'phone'   => '082233445566',
                'address' => 'Jl. Merpati No. 11, Bandung',
            ],
            [
                'name'    => 'Andi Wijaya',
                'status'  => 'member',
                'email'   => 'andi.wijaya@example.com',
                'phone'   => '085612345678',
                'address' => 'Jl. Gajah Mada No. 5, Surabaya',
            ],
            [
                'name'    => 'Dewi Lestari',
                'status'  => 'non member',
                'email'   => 'dewi.lestari@example.com',
                'phone'   => '081355667788',
                'address' => 'Jl. Anggrek No. 3, Medan',
            ],
            [
                'name'    => 'Rudi Hartono',
                'status'  => 'member',
                'email'   => 'rudi.hartono@example.com',
                'phone'   => '087812341234',
                'address' => 'Jl. Kenanga No. 18, Makassar',
            ],
        ]);
    }
}
