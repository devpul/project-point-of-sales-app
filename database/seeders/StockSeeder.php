<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->insert([
            [
                'name'          => 'Gula Pasir',
                'unit'          => 'kg',
                'warehouse_id'  => 1,
                'current_stock' => 120,
                'created_at'    => now(),
                // 'updated_at'    => now(),
            ],
            [
                'name'          => 'Tepung Terigu',
                'unit'          => 'kg',
                'warehouse_id'  => 1,
                'current_stock' => 80,
                'created_at'    => now(),
                // 'updated_at'    => now(),
            ],
            [
                'name'          => 'Minyak Goreng',
                'unit'          => 'liter',
                'warehouse_id'  => 2,
                'current_stock' => 45,
                'created_at'    => now(),
                // 'updated_at'    => now(),
            ],
            [
                'name'          => 'Beras Premium',
                'unit'          => 'kg',
                'warehouse_id'  => 1,
                'current_stock' => 200,
                'created_at'    => now(),
                // 'updated_at'    => now(),
            ],
            [
                'name'          => 'Kopi Bubuk',
                'unit'          => 'gram',
                'warehouse_id'  => 3,
                'current_stock' => 500,
                'created_at'    => now(),
                // 'updated_at'    => now(),
            ],
        ]);
    }
}
