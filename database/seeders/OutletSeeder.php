<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outlets')->insert([
            [
                'name'      => 'Outlet Central Park',
                'address'   => 'Jl. Letjen S. Parman No.28, Jakarta Barat',
                'phone'     => '081234567890',
                'email'     => 'centralpark@toko.com',
                'status'    => 'active',
            ],
            [
                'name'      => 'Outlet Kelapa Gading',
                'address'   => 'Jl. Boulevard Raya, Jakarta Utara',
                'phone'     => '081298765432',
                'email'     => 'kelapagading@toko.com',
                'status'    => 'active',
            ],
            [
                'name'      => 'Outlet Bandung',
                'address'   => 'Jl. Asia Afrika No.120, Bandung',
                'phone'     => '082112233445',
                'email'     => 'bandung@toko.com',
                'status'    => 'inactive',
            ],
            [
                'name'      => 'Outlet Surabaya',
                'address'   => 'Jl. Darmo Permai Selatan, Surabaya',
                'phone'     => '081355667788',
                'email'     => 'surabaya@toko.com',
                'status'    => 'active',
            ],
            [
                'name'      => 'Outlet Yogyakarta',
                'address'   => 'Jl. Malioboro No.100, Yogyakarta',
                'phone'     => '083822334455',
                'email'     => 'yogyakarta@toko.com',
                'status'    => 'inactive',
            ],
        ]);
    }
}
