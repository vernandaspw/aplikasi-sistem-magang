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
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
          ],
          [
            'id' => 2,
            'nama' => 'Agus',
            'username' => 'pembimbing',
            'password' => Hash::make('pembimbing123'),
            'role' => 'pembimbing'
          ],
          [
            'id' => 3,
            'nama' => 'Arip',
            'username' => 'peserta',
            'password' => Hash::make('peserta123'),
            'role' => 'peserta'
          ],
        ]);
    }
}
