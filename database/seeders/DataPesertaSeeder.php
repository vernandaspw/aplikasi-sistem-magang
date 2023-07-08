<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_pesertas')->insert([
            [
                'peserta_id' => 3,
                'no_hp' => '082235434543',
                'jk' => 'p',
                'alamat' => 'jl jakabaring 2',
                'asal_instansi' => 'polsri',
                'jurusan' => 'teknik sipil',
                'konsentrasi' => 'arsitek',
      
            ],
          ]);
    }
}
