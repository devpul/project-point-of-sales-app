<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {

            Users::insert([
                [
                    'name'          =>  'admin',
                    'email'         =>  'admin@gmail.com',
                    'password'      => Hash::make('admin'),
                    'role'          =>  'admin',
                    'registered_at' =>  now(),
                    'updated_at'    =>  now(),
                ],
                [
                    'name'          =>  'manager',
                    'email'         =>  'manager@gmail.com',
                    'password'      => Hash::make('manager'),
                    'role'          =>  'manager',
                    'registered_at' =>  now(),
                    'updated_at'    =>  now(),
                ],
                [
                    'name'      =>  'kasir',
                    'email'     =>  'kasir@gmail.com',
                    'password'  => Hash::make('kasir'),
                    'role'      =>  'kasir',
                    'registered_at' =>  now(),
                    'updated_at'    =>  now(),
                ],
            ]);

            echo "✅ Berhasil.";

        } catch (\Exception $e) {
            echo "❌ Gagal." . PHP_EOL . $e->getMessage();
        }
    }
}
