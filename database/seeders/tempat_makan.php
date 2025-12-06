<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class tempat_makan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_tempat' => 'Ayam Geprek Mantap',
                'kategori_id' => 2, // contoh: Warung
                'alamat' => 'Jl. Mawar No. 12, Jember',
                'jam_operasional' => '08:00 - 21:00',
                'geom' => DB::raw("ST_GeomFromText('POINT(113.6879 -8.1725)', 4326)")
            ],
            [
                'nama_tempat' => 'Kopi Senja',
                'kategori_id' => 3, // Kafe
                'alamat' => 'Jl. PB Sudirman No. 20, Jember',
                'jam_operasional' => '10:00 - 23:00',
                'geom' => DB::raw("ST_GeomFromText('POINT(113.6991 -8.1652)', 4326)")
            ],
            [
                'nama_tempat' => 'McDonald’s Jember',
                'kategori_id' => 4, // Fast Food
                'alamat' => 'Jl. Riau No. 5, Jember',
                'jam_operasional' => '24 Jam',
                'geom' => DB::raw("ST_GeomFromText('POINT(113.7060 -8.1687)', 4326)")
            ],
        ];

        DB::table('tempat_makan')->insert($data);
    }
}
