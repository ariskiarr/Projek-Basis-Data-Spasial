<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class user_favorites extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $data = [
            [
                'users_id' => 1,
                'tempat_id' => 1,

            ],
            [
                'users_id' => 1,
                'tempat_id' => 2,

            ],
            [
                'users_id' => 1,
                'tempat_id' => 3,

            ],
        ];

        DB::table('user_favorites')->insert($data);
    }
}
