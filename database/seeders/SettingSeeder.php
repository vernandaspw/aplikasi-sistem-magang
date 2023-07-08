<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
              'nama_instansi' => 'RRI PALEMBANG ',
              'deskripsi_instansi' => 'Radio Republik Indonesia secara resmi didirikan pada tanggal 11 September 1945, oleh para tokoh yang sebelumnya aktif mengoperasikan beberapa stasiun radio Jepang di 6 kota. Rapat utusan 6 radio di rumah Adang Kadarusman, Jalan Menteng Dalam Jakarta, menghasilkan keputusan mendirikan Radio Republik Indonesia dengan memilih Dokter Abdulrahman Saleh sebagai pemimpin umum RRI yang pertama. Rapat tersebut juga menghasilkan suatu deklarasi yang terkenal dengan sebutan Piagam 11 September 1945, yang berisi 3 butir komitmen tugas dan fungsi RRI yang kemudian dikenal dengan Tri Prasetya RRI.',
                'alamat_instansi' => 'ALAMAT KANTOR RRI PALEMBANG : Jln. Radio No. 2 Rt. 27 KM 4 Kelurahan 20 Ilir D IV Kecamatan Ilir Timur 1 Palembang Kode Pos 30128 Telp. (0711) 350811',
                'email' => 'ppid@rri.go.id',
                'wa' => '+6221-384-9091',
                'twitter' => 'http://twitter.com/ppid_rri',
                'ig' => 'http://instagram.com/ppid.rri/'
            ],
          ]);
    }
}
