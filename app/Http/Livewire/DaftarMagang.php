<?php

namespace App\Http\Livewire;

use App\Models\Bagian;
use App\Models\DataMagang;
use App\Models\Posisi;
use Livewire\Component;
use Livewire\WithFileUploads;

class DaftarMagang extends Component
{
    public function render()
    {
        $this->bagians = Bagian::get();
        $this->posisis = Posisi::get();
        return view('livewire.daftar-magang')->layout('app');
    }

    use WithFileUploads;

    public $surat_pengantar;
    public $posisi_id;
    public $bagian_id;
    public $catatan_peserta;

    public function buat()
    {
        // cek apakah masih magang, jika masih magang tidak boleh daftar
        $dataMagang = DataMagang::where('peserta_id', auth()->user()->id)->where('status', 'magang')->orWhere('status', 'pengajuan')->first();
        if ($dataMagang) {
            $this->emit('error', ['pesan' => 'Sudah pernah mengajukan / sedang magang disini']);
        } else {
            if ($this->surat_pengantar) {
                $surat_pengantar = $this->surat_pengantar->store('img');
            } else {
                $surat_pengantar = null;
            }

            DataMagang::create([
                'peserta_id' => auth()->user()->id,
                'posisi_id' => $this->posisi_id,
                'bagian_id' => $this->bagian_id,
                'tanggal_daftar' => now(),
                'status' => 'pengajuan',
                'catatan_peserta' => $this->catatan_peserta,
                'surat_pengantar' => $surat_pengantar,
            ]);
            redirect('data-magang');
            $this->emit('success', ['pesan' => 'berhasil mengajukan magang, tunggu pengajuan diterima']);
        }

    }
}
