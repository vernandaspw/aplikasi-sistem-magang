<?php

namespace App\Http\Livewire;

use App\Models\Posisi;
use Livewire\Component;

class PosisiPage extends Component
{
    public function render()
    {
        $this->posisis = Posisi::get();
        return view('livewire.posisi-page')->layout('app');
    }

    public $createPage = false;
    public $nama;

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
        Posisi::create([
            'nama' => $this->nama,
        ]);
        $this->createPage = false;
    }

    public function hapus($id)
    {
        $data = Posisi::where('id', $id)->first();
        $data->delete();

        $this->emit('success', ['pesan' => 'berhasil hapus']);
    }

    public $editPage = false;
    public $editnama;
    public $ID;

    public function editPageTrue($id)
    {
        $d = Posisi::find($id);
        $this->ID = $id;
        $this->editnama = $d->nama;

        $this->editPage = true;
    }
    public function editPageFalse()
    {
        $this->editPage = false;
    }
    public function edit()
    {
        $data = Posisi::where('id', $this->ID)->first();
        $data->nama = $this->editnama;
        $data->save();

        $this->emit('success', ['pesan' => 'berhasil edit']);
    }


}
