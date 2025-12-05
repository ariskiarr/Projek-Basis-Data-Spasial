<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class menu_makan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tempat_id' => 1,
                'nama_menu' => 'Ayam Geprek Original',
                'harga' => 8500,
                'kalori' => 350.00,
            ],
            [
                'tempat_id' => 1,
                'nama_menu' => 'Nasi + Es Teh',
                'harga' => 5000,
                'kalori' => 180.00,
            ],
            [
                'tempat_id' => 2,
                'nama_menu' => 'Latte Coffee',
                'harga' => 9500,
                'kalori' => 190.00,
            ],
            [
                'tempat_id' => 2,
                'nama_menu' => 'Croissant',
                'harga' => 6000,
                'kalori' => 220.00,
            ],
            [
                'tempat_id' => 3,
                'nama_menu' => 'Burger Beef',
                'harga' => 9000,
                'kalori' => 450.00,
            ],
        ];

        DB::table('menu_makan')->insert($data);
    }
}
