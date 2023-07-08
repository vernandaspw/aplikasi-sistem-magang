<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DataPesertaPage extends Component
{
    public function render()
    {
        $this->pesertas = User::where('role', 'peserta')->get();
        return view('livewire.data-peserta-page')->layout('app');
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
    public $ID, $password;

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
