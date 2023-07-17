<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataAdminPage extends Component
{
    public function render()
    {
        $this->admins = User::where('role', 'admin')->get();
        return view('livewire.data-admin-page')->layout('app');
    }

    use WithFileUploads;

    public $createPage = false;

    public $img;
    public $nama;
    public $email;
    public $password;

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
        }else{
            $image = null;
        }
        User::create([
            'nama' => $this->nama,
            'img' => $image,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => 'admin',
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
                'isaktif' => false
            ]);
        }else{
            $data->update([
                'isaktif' => true
            ]);
        }
    }
}
