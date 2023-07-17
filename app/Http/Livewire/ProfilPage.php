<?php

namespace App\Http\Livewire;

use App\Models\DataPembimbing;
use App\Models\DataPeserta;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilPage extends Component
{
    public function render()
    {
        return view('livewire.profil-page')->layout('app');
    }

    use WithFileUploads;

    public $img, $nama, $username, $no_hp, $jk, $alamat, $asal_instansi, $jurusan, $konsentrasi;

    public $gambar;

    public function mount()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();


        $this->gambar = $user->img;
        $this->img = $user->img;
        $this->nama = $user->nama;
        $this->username = $user->username;

        if (auth()->user()->role == 'peserta') {
            $data_peserta = DataPeserta::where('peserta_id', $id)->first();
            $this->no_hp = $data_peserta->no_hp;
            $this->jk = $data_peserta->jk;
            $this->alamat = $data_peserta->alamat;
            $this->asal_instansi = $data_peserta->asal_instansi;
            $this->jurusan = $data_peserta->jurusan;
            $this->konsentrasi = $data_peserta->konsentrasi;
        } else if (auth()->user()->role == 'pembimbing') {
            $data_pembimbing = DataPembimbing::where('pembimbing_id', $id)->first();
            $this->no_hp = $data_pembimbing->no_hp;
            $this->jk = $data_pembimbing->jk;
            $this->alamat = $data_pembimbing->alamat;
        }

    }

    public function updatePeserta()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();

        $data_peserta = DataPeserta::where('peserta_id', $id)->first();

        if ($this->img) {
            Storage::delete($this->img);
            $img = $this->img->store('img');
        } else {
            $img = $this->img->store('img');
        }

        $user->update([
            'img' => $img,
            'nama' => $this->nama,
            'username' => $this->username,
        ]);

        $data_peserta->update([
            'no_hp' => $this->no_hp,
            'jk' => $this->jk,
            'alamat' => $this->alamat,
            'asal_instansi' => $this->asal_instansi,
            'jurusan' => $this->jurusan,
            'konsentrasi' => $this->konsentrasi,
        ]);
        $this->emit('success', ['pesan' => 'Berhasil perbarui']);
        return redirect(request()->header('Referer'));
    }
    public function updatePembimbing()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();

        $data_pembimbing = DataPembimbing::where('pembimbing_id', $id)->first();

        if ($this->img) {
            Storage::delete($this->img);
            $img = $this->img->store('img');
        } else {
            $img = $this->img->store('img');
        }


        $user->update([
            'img' => $img,
            'nama' => $this->nama,
            'username' => $this->username,
        ]);

        $data_pembimbing->update([
            'no_hp' => $this->no_hp,
            'jk' => $this->jk,
            'alamat' => $this->alamat,
        ]);
        $this->emit('success', ['pesan' => 'Berhasil perbarui']);
        return redirect(request()->header('Referer'));
    }
    public function updateAdmin()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();

        if ($this->img) {
            Storage::delete($this->img);
            $img = $this->img->store('img');
        } else {
            $img = $this->img->store('img');
        }


        $user->update([
            'img' => $img,
            'nama' => $this->nama,
            'username' => $this->username,
        ]);

        $this->emit('success', ['pesan' => 'Berhasil perbarui']);
        return redirect(request()->header('Referer'));
    }
}
