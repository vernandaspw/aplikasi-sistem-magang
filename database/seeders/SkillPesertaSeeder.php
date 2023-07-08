<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class SkillPesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skill_pesertas')->insert([
            [
                'id' => \Str::uuid(),
                'peserta_id' => 3,
                'keterangan' => 'microsoft office'
            ],
          ]);
    }
}
