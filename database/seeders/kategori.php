<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $data = [
            ['nama_kategori' => 'Restoran'],
            ['nama_kategori' => 'Cafe'],
            ['nama_kategori' => 'Warung Makan'],
            ['nama_kategori' => 'Fast Food'],
            ['nama_kategori' => 'Street Food'],
            ['nama_kategori' => 'Bakery'],
            ['nama_kategori' => 'Dessert & Ice Cream'],
            ['nama_kategori' => 'Seafood'],
            ['nama_kategori' => 'Asian Food'],
            ['nama_kategori' => 'Western Food'],
        ];
         DB::table('kategori')->insert($data);
    }
}
