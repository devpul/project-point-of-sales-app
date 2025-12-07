<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warehouses')->insert([
            [
                'name'           => 'Gudang Pusat Jakarta',
                'code'           => 'WH-JKT-01',
                'address'        => 'Jl. Industri No. 18, Kawasan Niaga Cakung',
                'city'           => 'Jakarta',
                'province'       => 'DKI Jakarta',
                'contact_person' => 'Andi Pratama',
                'phone'          => 81234567890,
                'email'          => 'warehouse.jakarta@example.com',
                'is_active'      => 1,
                'notes'          => 'Distribusi utama untuk area Jabodetabek.',
                'created_at'     => now(),
                // 'updated_at'     => now(),
            ],
            [
                'name'           => 'Gudang Surabaya',
                'code'           => 'WH-SBY-02',
                'address'        => 'Jl. Tandes Utara No. 7, Surabaya Barat',
                'city'           => 'Surabaya',
                'province'       => 'Jawa Timur',
                'contact_person' => 'Rina Sari',
                'phone'          => 81311122334,
                'email'          => 'warehouse.sby@example.com',
                'is_active'      => 1,
                'notes'          => 'Menangani distribusi area Jawa Timur dan sekitarnya.',
                'created_at'     => now(),
                // 'updated_at'     => now(),
            ],
            [
                'name'           => 'Gudang Bandung',
                'code'           => 'WH-BDG-03',
                'address'        => 'Jl. Kopo No. 55, Bandung',
                'city'           => 'Bandung',
                'province'       => 'Jawa Barat',
                'contact_person' => 'Fajar Wijaya',
                'phone'          => 81299887766,
                'email'          => 'warehouse.bdg@example.com',
                'is_active'      => 1,
                'notes'          => 'Ready stock untuk area Jawa Barat dan Banten.',
                'created_at'     => now(),
                // 'updated_at'     => now(),
            ],
            [
                'name'           => 'Gudang Medan',
                'code'           => 'WH-MDN-04',
                'address'        => 'Jl. Sisingamangaraja No. 21, Medan',
                'city'           => 'Medan',
                'province'       => 'Sumatera Utara',
                'contact_person' => 'Hendra Lubis',
                'phone'          => 81344556677,
                'email'          => 'warehouse.medan@example.com',
                'is_active'      => 1,
                'notes'          => 'Fokus supply untuk area Sumatera Utara & Aceh.',
                'created_at'     => now(),
                // 'updated_at'     => now(),
            ],
            [
                'name'           => 'Gudang Makassar',
                'code'           => 'WH-MKS-05',
                'address'        => 'Jl. Perintis Kemerdekaan No. 9, Makassar',
                'city'           => 'Makassar',
                'province'       => 'Sulawesi Selatan',
                'contact_person' => 'Siti Nurhayati',
                'phone'          => 81277665544,
                'email'          => 'warehouse.makassar@example.com',
                'is_active'      => 1,
                'notes'          => 'Distribusi untuk wilayah Sulawesi dan sekitarnya.',
                'created_at'     => now(),
                // 'updated_at'     => now(),
            ],
        ]);
    }
}
