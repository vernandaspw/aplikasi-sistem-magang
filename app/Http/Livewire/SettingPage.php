<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class SettingPage extends Component
{
    public function render()
    {
        return view('livewire.setting-page')->layout('app');
    }

    public $ID;
    public $nama_instansi;
    public $deskripsi_instansi;
    public $alamat_instansi;
    public $email;
    public $wa;
    public $ig;
    public $twitter;

    public function mount()
    {
        $data = Setting::where('id', 1)->first();
        $this->ID = $data->id;
        $this->nama_instansi = $data->nama_instansi;
        $this->deskripsi_instansi = $data->deskripsi_instansi;
        $this->alamat_instansi = $data->alamat_instansi;
        $this->email = $data->email;
        $this->wa = $data->wa;
        $this->ig = $data->ig;
        $this->twitter = $data->twitter;
    }

    public function perbarui()
    {
        $data = Setting::where('id', $this->ID)->first();
        $data->update([
            'nama_instansi' => $this->nama_instansi,
            'deskripsi_instansi' => $this->deskripsi_instansi,
            'alamat_instansi' => $this->alamat_instansi,
            'email' => $this->email,
            'wa' => $this->wa,
            'ig' => $this->ig,
            'twitter' => $this->twitter,
        ]);

        $this->emit('success', ['pesan' => 'Berhasil memperbarui']);
    }
}
