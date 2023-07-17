<?php

namespace App\Http\Livewire;

use App\Models\Bagian;
use App\Models\DataMagang;
use App\Models\DataPenilaian;
use App\Models\Posisi;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataMagangPage extends Component
{
    public function render()
    {
        $data = DataMagang::latest();
        if (auth()->user()->role == 'peserta') {
            $data->where('peserta_id', auth()->user()->id);
        }

        if (auth()->user()->role == 'pembimbing') {
            $data->where('pembimbing_id', auth()->user()->id);
        }

        $this->data_magangs = $data->get();

        $this->pembimbings = User::where('role', 'pembimbing')->where('isaktif', true)->get();

        $this->posisis = Posisi::latest()->get();
        $this->bagians = Bagian::latest()->get();

        $this->laporan_data_magangs = DataMagang::where('status', 'magang')->get();

        return view('livewire.data-magang-page')->layout('app');
    }
    use WithFileUploads;

    public $laporan_data_magangs;

    public $editPage = false;

    public $img;
    public $nama;

    public function editPageTrue()
    {
        $this->editPage = true;
    }
    public function editPageFalse()
    {
        $this->editPage = false;
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

    public $terimaPengajuanPage = false;
    public $ID;
    public $pembimbing_id;
    public $magang_mulai;
    public $magang_selesai;
    public $surat_balasan;
    public $sertifikat;

    public function terima_pengajuanTrue($id)
    {
        $this->ID = $id;
        $this->terimaPengajuanPage = true;
    }

    public function terima_pengajuan()
    {
        // dd('ad');
        if ($this->magang_mulai > $this->magang_selesai) {
            $this->emit('error', ['pesan' => 'Waktu mulai magang tidak boleh setelah tanggal selesai']);
        } else {
            $data = DataMagang::where('id', $this->ID)->first();
            if ($this->surat_balasan) {
                $img = $this->surat_balasan->store('img');
            } else {
                $img = null;
            }
            $data->update([
                'diterima_oleh_id' => auth()->user()->id,
                'pembimbing_id' => $this->pembimbing_id,
                'magang_mulai' => $this->magang_mulai,
                'magang_selesai' => $this->magang_selesai,
                'status' => 'magang',
                'surat_balasan' => $img,
            ]);
            $this->terimaPengajuanPage = false;
            $this->emit('success', ['pesan' => 'Berhasil terima pengajuan']);
        }
    }

    public function tolakPengajuan($id)
    {
        $data = DataMagang::where('id', $id)->first();
        $data->update([
            'status' => 'ditolak',
        ]);
        $this->emit('success', ['pesan' => 'Berhasil ditolak']);
    }

    public function gagal_magang($id)
    {
        $data = DataMagang::where('id', $id)->first();
        $data->update([
            'status' => 'gagal',
        ]);
        $this->emit('success', ['pesan' => 'Peserta Gagal Magang']);
    }

    public $magang_selesaiProsesPage = false;
    public function magang_selesaiProsesTrue($id)
    {
        // cek pembimbing sudah nilai belum
        $data = DataPenilaian::where('data_magang_id', $id)->first();
        if ($data) {
            $this->ID = $id;
            $this->magang_selesaiProsesPage = true;
        } else {
            $this->emit('error', ['pesan' => 'Pembimbing belum memberi nilai']);
        }
    }
    public function magang_selesai_proses()
    {
        $data = DataMagang::where('id', $this->ID)->first();
        if ($this->sertifikat) {
            $img = $this->sertifikat->store('img');
        } else {
            $img = null;
        }
        $data->update([
            'status' => 'alumni',
            'sertifikat' => $img,
        ]);
        $this->magang_selesaiProsesPage = false;
        $this->emit('success', ['pesan' => 'Berhasil Selesai magang']);
    }

    public $beriNilaiPage = false;
    public $nilai_kehadiran;
    public $nilai_disiplin;
    public $nilai_produktivitas_kerja;

    public function beriNilaiTrue($id)
    {
        $this->ID = $id;
        $this->beriNilaiPage = true;
    }
    public function beri_nilai()
    {
        DataPenilaian::create([
            'data_magang_id' => $this->ID,
            'nilai_kehadiran' => $this->nilai_kehadiran,
            'nilai_disiplin' => $this->nilai_disiplin,
            'nilai_produktivitas_kerja' => $this->nilai_produktivitas_kerja,
        ]);
        $this->beriNilaiPage = false;
        $this->emit('success', ['pesan' => 'Berhasil Memberi Nilai']);
    }

    public $ubahDataMagangPage = false;

    public $e_pembimbing_id;
    public $e_posisi_id;
    public $e_bagian_id;
    public $e_mulai_magang;
    public $e_selesai_magang;

    public function ubah_data_magang_page_true($id)
    {
        $this->ID = $id;

        $data = DataMagang::where('id', $id)->first();
        $this->e_pembimbing_id = $data->pembimbing_id;
        $this->e_posisi_id = $data->posisi_id;
        $this->e_bagian_id = $data->bagian_id;
        $this->e_mulai_magang = $data->magang_mulai;
        $this->e_selesai_magang = $data->magang_selesai;

        $this->ubahDataMagangPage = true;

    }

    public function ubahDataMagang()
    {
        $id = $this->ID;

        if ($this->e_mulai_magang > $this->e_selesai_magang) {
            $this->emit('error', ['pesan' => 'Waktu mulai magang tidak boleh setelah tanggal selesai']);
        }else{

            $data = DataMagang::where('id', $id)->first();

            $data->update([
                'pembimbing_id' => $this->e_pembimbing_id,
                'posisi_id' => $this->e_posisi_id,
                'bagian_id' => $this->e_bagian_id,
                'magang_mulai' => $this->e_mulai_magang,
                'magang_selesai' => $this->e_selesai_magang,
            ]);

            $this->ubahDataMagangPage = false;
            $this->emit('success', ['pesan' => 'Berhasil ubah data']);
        }

    }

}
