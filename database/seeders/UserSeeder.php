<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
          [
            'id' => 1,
            'nama' => 'jon admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
          ],
          [
            'id' => 2,
            'nama' => 'Agus',
            'email' => 'pembimbing@gmail.com',
            'password' => Hash::make('pembimbing123'),
            'role' => 'pembimbing'
          ],
          [
            'id' => 3,
            'nama' => 'Arip',
            'email' => 'peserta@gmail.com',
            'password' => Hash::make('peserta123'),
            'role' => 'peserta'
          ],
        ]);
    }
}
