<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ulasan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tempat_id' => 1,
                'sumber' => 'Google Maps',
                'penulis' => 'Rizki Ahmad',
                'ulasan' => 'Ayamnya enak, pedasnya pas! Harganya juga terjangkau.',
                'rating' => 4.50,
                'tanggal' => now(),
            ],
            [
                'tempat_id' => 1,
                'sumber' => 'Instagram',
                'penulis' => 'Dina Putri',
                'ulasan' => 'Tempatnya sederhana tapi makanannya mantap.',
                'rating' => 4.20,
                'tanggal' => now()->subDays(2),
            ],
            [
                'tempat_id' => 2,
                'sumber' => 'Google Maps',
                'penulis' => 'Fajar Kurniawan',
                'ulasan' => 'Kopinya enak dan suasananya nyaman buat nugas.',
                'rating' => 4.80,
                'tanggal' => now()->subDays(5),
            ],
            [
                'tempat_id' => 3,
                'sumber' => 'TripAdvisor',
                'penulis' => 'Bella Arum',
                'ulasan' => 'Burgernya besar dan juicy! Recommended!',
                'rating' => 4.90,
                'tanggal' => now()->subWeek(),
            ],
        ];

        DB::table('ulasan')->insert($data);
    }
}
