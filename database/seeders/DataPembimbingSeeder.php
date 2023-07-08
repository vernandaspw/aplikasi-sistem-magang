<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPembimbingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_pembimbings')->insert([

                'pembimbing_id' => 2,
                'no_hp' => '08222222222',
                'jk' => 'l',
                'alamat' => 'jl ilir timus 1',

        ]);
    }
}
