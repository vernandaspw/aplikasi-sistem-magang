<?php

namespace App\Http\Livewire;

use App\Models\DataPembimbing;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataPembimbingPage extends Component
{
    public function render()
    {
        $this->pembimbings = User::where('role', 'pembimbing')->get();
        return view('livewire.data-pembimbing-page')->layout('app');
    }

    use WithFileUploads;

    public $createPage = false;

    public $img;
    public $nama;
    public $username;
    public $password;
    public $no_hp;
    public $jk;
    public $nip;
    public $alamat;

    public function createPageTrue()
    {
        $this->createPage = true;
    }
    public function createPageFalse()
    {
        $this->createPage = false;
    }

    public function buat()
    {
        if ($this->img) {
            $image = $this->img->store('img');
        } else {
            $image = null;
        }
        $user = User::create([
            'nama' => $this->nama,
            'img' => $image,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => 'pembimbing',
        ]);
        DataPembimbing::create([
            'pembimbing_id' => $user->id,
            'nip' => $this->nip,
            'no_hp' => $this->no_hp,
            'jk' => $this->jk,
            'alamat' => $this->alamat,
        ]);
        $this->createPage = false;
        $this->emit('success', ['pesan' => 'berhasil buat baru']);
        $storage = Storage::disk('public');
        if ($storage) {
            foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
                $storage->delete($filePathname);
            }
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

    public $ubahPassPage = false;
    public $ID;

    public function ubahPassPageTrue($id)
    {
        $this->ID = $id;
        $this->ubahPassPage = true;
    }

    public function ubahPass()
    {
        $id = $this->ID;
        $user = User::where('id', $id)->first();
        $user->update([
            'password' => Hash::make($this->password),
        ]);
        $this->ubahPassPage = false;
        $this->emit('success', ['pesan' => 'Berhasil ubah password']);
    }
}
