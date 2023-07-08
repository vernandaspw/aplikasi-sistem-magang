<?php

namespace App\Http\Livewire;

use App\Models\DataKehadiran;
use App\Models\DataKehadiranPembimbing;
use Livewire\Component;

class DataKehadiranPembimbingPage extends Component
{
    public function render()
    {
        $data = DataKehadiranPembimbing::latest();

        if (auth()->user()->role == 'pembimbing') {
            $data->where('pembimbing_id', auth()->user()->id);
        }

        $this->data_kehadirans = $data->get();
        $absenHariIni = DataKehadiranPembimbing::where('tanggal', date('Y-m-d'))->where('jam_keluar', null)->where('status_kehadiran', 'setengah hari')->first();
        if ($absenHariIni) {
            $this->absenMasukPage = false;
            $this->absenKeluarPage = true;
        }
        $absenHariIni = DataKehadiranPembimbing::where('tanggal', date('Y-m-d'))->first();
        if ($absenHariIni) {
        } else {
            $this->absenMasukPage = true;
            $this->absenKeluarPage = false;
        }

        return view('livewire.data-kehadiran-pembimbing-page')->layout('app');
    }

    public $absenMasukPage = false, $absenKeluarPage = false;

    public function absenMasuk()
    {
        $data = DataKehadiranPembimbing::where('pembimbing_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($data) {
            $this->emit('error', ['pesan' => 'Belum bisa absen lagi, karena masih ada absen kehadiran yang masih pending']);
        }else{
            DataKehadiranPembimbing::create([
                'pembimbing_id' => auth()->user()->id,
                'tanggal' => date('Y-m-d'),
                'jam_masuk' => date('H:i'),
                'status_kehadiran' => 'setengah hari',
                'status' => 'pending',
            ]);

            $this->absenMasukPage = false;
            $this->emit('success', ['pesan' => 'berhasil absen masuk']);
        }
    }

    public function absenTidakHadir()
    {
        $data = DataKehadiranPembimbing::where('pembimbing_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($data) {
            $this->emit('error', ['pesan' => 'Belum bisa absen lagi, karena masih ada absen kehadiran yang masih pending']);
        } else {
            DataKehadiranPembimbing::create([
                'pembimbing_id' => auth()->user()->id,
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
        $data = DataKehadiranPembimbing::where('pembimbing_id', auth()->user()->id)->where('tanggal', date('Y-m-d'))->where('jam_keluar', null)->first();
        if ($data) {
            // cek sudah apakah masih ada siswa hari ini yg pending
            $dataHadirPeserta = DataKehadiran::where('tanggal', date('Y-m-d'))->where('status', 'pending')->get()->count();
            if ($dataHadirPeserta < 1) {
                $data->update([
                    'jam_keluar' => date('H:i'),
                    'status_kehadiran' => 'hadir',
                    'status' => 'disetujui'
                ]);

                $this->absenKeluarPage = false;
                $this->emit('success', ['pesan' => 'berhasil absen keluar']);

            }else{

                $this->emit('error', ['pesan' => 'Masih ada absen siswa yang belum selesai disetujui']);
            }

        } else {
            $this->emit('error', ['pesan' => 'Tidak bisa absen keluar']);
        }
    }

    public function ubahStatusApprove($id)
    {
        $data = DataKehadiranPembimbing::where('id', $id)->first();
        $data->update([
            'status' => 'disetujui',
        ]);
        $this->emit('success', ['pesan' => 'berhasil menyetujui']);
    }
    public function ubahStatusReject($id)
    {
        $data = DataKehadiranPembimbing::where('id', $id)->first();
        $data->update([
            'status' => 'ditolak',
        ]);
        $this->emit('success', ['pesan' => 'berhasil menolak absensi']);
    }
}
