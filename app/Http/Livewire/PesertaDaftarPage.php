<?php

namespace App\Http\Livewire;

use App\Models\Bagian;
use App\Models\DataMagang;
use App\Models\DataPeserta;
use App\Models\Posisi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class PesertaDaftarPage extends Component
{
    public function render()
    {
        $this->bagians = Bagian::get();
        $this->posisis = Posisi::get();
        return view('livewire.peserta-daftar-page')->layout('app');
    }

    use WithFileUploads;

    public $img;
    public $nama;
    public $email;
    public $password;
    public $no_hp;
    public $jk;
    public $alamat;
    public $asal_instansi;
    public $jurusan;
    public $konsentrasi;

    public $surat_pengantar;
    public $posisi_id;
    public $bagian_id;
    public $catatan_peserta;

    public function daftar()
    {
        if ($this->img) {
            $image = $this->img->store('img');
        } else {
            $image = null;
        }

        $user = User::create([
            'img' => $image,
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'peserta',
        ]);

        DataPeserta::create([
            'peserta_id' => $user->id,
            'no_hp' => $this->no_hp,
            'jk' => $this->jk,
            'alamat' => $this->alamat,
            'asal_instansi' => $this->asal_instansi,
            'jurusan' => $this->jurusan,
            'konsentrasi' => $this->konsentrasi,
        ]);

        if ($this->surat_pengantar) {
            $surat_pengantar = $this->surat_pengantar->store('img');
        } else {
            $surat_pengantar = null;
        }

        DataMagang::create([
            'peserta_id' => $user->id,
            'posisi_id' => $this->posisi_id,
            'bagian_id' => $this->bagian_id,
            'tanggal_daftar' => now(),
            'status' => 'pengajuan',
            'catatan_peserta' => $this->catatan_peserta,
            'surat_pengantar' => $surat_pengantar,
        ]);
        redirect('data-magang');
        $this->emit('success', ['pesan' => 'berhasil mengajukan magang, tunggu pengajuan diterima']);

        auth()->login($user, true);
        redirect('dashboard');
    }
}
