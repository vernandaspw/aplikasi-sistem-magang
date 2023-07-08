<?php

namespace App\Http\Livewire;

use App\Models\DataKegiatan;
use App\Models\DataKehadiran;
use App\Models\DataMagang;
use App\Models\User;
use Livewire\Component;

class DataKehadiranPage extends Component
{
    public $data_magang_peserta;
    public $data_magang_pembimbing;

    public function render()
    {
        $data = DataKehadiran::latest();
        if (auth()->user()->role == 'pembimbing') {
            $data->whereRelation('data_magang', 'pembimbing_id', auth()->user()->id);

            $this->data_magang_pembimbing = DataMagang::where('pembimbing_id', auth()->user()->id)->where('status', 'magang')->first();
        }
        if (auth()->user()->role == 'peserta') {
            $data->where('peserta_id', auth()->user()->id);

            //  cek data magang saya
            $this->data_magang_peserta = DataMagang::where('peserta_id', auth()->user()->id)->where('status', 'magang')->first();

            if ($this->data_magang_peserta) {
                $data->where('data_magang_id', $this->data_magang_peserta->id);
            }
        }
        $this->data_kehadirans = $data->get();

        // cek kehadiran hari ini
        $absenHariIni = DataKehadiran::where('tanggal', date('Y-m-d'))->where('jam_keluar', null)->where('status_kehadiran', 'setengah hari')->first();
        // dd($absenHariIni);

        if ($absenHariIni) {
            $this->absenMasukPage = false;
            $this->absenKeluarPage = true;
        }
        $absenHariIni = DataKehadiran::where('tanggal', date('Y-m-d'))->first();
        if ($absenHariIni) {
        } else {
            $this->absenMasukPage = true;
            $this->absenKeluarPage = false;
        }

        return view('livewire.data-kehadiran-page')->layout('app');
    }

    public $absenMasukPage = false;
    public $absenKeluarPage = false;

    public function absenMasuk()
    {
        $data = DataKehadiran::where('peserta_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($data) {

            $this->emit('error', ['pesan' => 'Belum bisa absen lagi, karena masih ada absen kehadiran yang masih pending']);
        } else {
            DataKehadiran::create([
                'data_magang_id' => $this->data_magang_peserta->id,
                'peserta_id' => auth()->user()->id,
                'tanggal' => date('Y-m-d'),
                'jam_masuk' => date('H:i'),
                'status_kehadiran' => 'setengah hari',
                'status' => 'pending',
            ]);

            $this->absenMasukPage = false;
            $this->emit('success', ['pesan' => 'berhasil absen masuk']);
        }
    }

    public function absenIzin()
    {
        $data = DataKehadiran::where('peserta_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($data) {

            $this->emit('error', ['pesan' => 'Belum bisa absen lagi, karena masih ada absen kehadiran yang masih pending']);
        } else {
            DataKehadiran::create([
                'data_magang_id' => $this->data_magang_peserta->id,
                'peserta_id' => auth()->user()->id,
                'tanggal' => date('Y-m-d'),
                'status_kehadiran' => 'izin',
                'status' => 'pending',
            ]);

            $this->absenMasukPage = false;
            $this->emit('success', ['pesan' => 'berhasil mengajukan izin']);
        }
    }
    public function absenSakit()
    {
        $data = DataKehadiran::where('peserta_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($data) {

            $this->emit('error', ['pesan' => 'Belum bisa absen lagi, karena masih ada absen kehadiran yang masih pending']);
        } else {
            DataKehadiran::create([
                'data_magang_id' => $this->data_magang_peserta->id,
                'peserta_id' => auth()->user()->id,
                'tanggal' => date('Y-m-d'),
                'status_kehadiran' => 'sakit',
                'status' => 'pending',
            ]);

            $this->absenMasukPage = false;
            $this->emit('success', ['pesan' => 'berhasil mengajukan sakit']);
        }
    }
    public function absenTidakHadir()
    {
        $data = DataKehadiran::where('peserta_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($data) {
            $this->emit('error', ['pesan' => 'Belum bisa absen lagi, karena masih ada absen kehadiran yang masih pending']);
        } else {
            DataKehadiran::create([
                'data_magang_id' => $this->data_magang_peserta->id,
                'peserta_id' => auth()->user()->id,
                'tanggal' => date('Y-m-d'),
                'status_kehadiran' => 'tidak hadir',
                'status' => 'disetujui',
            ]);

            $this->absenMasukPage = false;
            $this->emit('success', ['pesan' => 'berhasil mengajukan tidak hadir']);
        }
    }

    public function absenKeluar()
    {
        $data = DataKehadiran::where('peserta_id', auth()->user()->id)->where('tanggal', date('Y-m-d'))->where('jam_keluar', null)->first();
        if ($data->data_kegiatans->count() >= 1) {
            $data->update([
                'jam_keluar' => date('H:i'),
                'status_kehadiran' => 'hadir',
            ]);

            $this->absenKeluarPage = false;
            $this->emit('success', ['pesan' => 'berhasil absen keluar']);
        } else {
            $this->emit('error', ['pesan' => 'Anda belum mencatat aktivitas kegiatan hari ini']);
        }

    }

    public function ubahStatus($id)
    {
        $data = User::where('id', $id)->first();
        if ($data->isaktif) {
            $data->update([
                'isaktif' => false,
            ]);
        } else {
            $data->update([
                'isaktif' => true,
            ]);
        }
    }

    public function ubahStatusApprove($id)
    {
        $data = DataKehadiran::where('id', $id)->first();
        $data->update([
            'status' => 'disetujui',
        ]);
        $this->emit('success', ['pesan' => 'berhasil menyetujui']);
    }
    public function ubahStatusReject($id)
    {
        $data = DataKehadiran::where('id', $id)->first();
        $data->update([
            'status' => 'ditolak',
        ]);
        $this->emit('success', ['pesan' => 'berhasil menolak absensi']);
    }

    public $catatKegiatanPage = false;
    public $ID;
    public $keterangan;

    public function catatKegiatanTrue($id)
    {
        $this->ID = $id;
        $this->catatKegiatanPage = true;
    }
    public function catatKegiatanFalse()
    {
        $this->catatKegiatanPage = false;
    }

    public function catatKegiatan()
    {
        DataKegiatan::create([
            'data_kehadiran_id' => $this->ID,
            'keterangan' => $this->keterangan,
        ]);
        $this->catatKegiatanPage = false;
        $this->emit('success', ['pesan' => 'Berhadil catat kegiatan']);
    }
}
