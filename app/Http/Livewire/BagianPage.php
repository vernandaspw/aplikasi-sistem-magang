<?php

namespace App\Http\Livewire;

use App\Models\Bagian;
use Livewire\Component;

class BagianPage extends Component
{
    public function render()
    {
        $this->bagians = Bagian::get();
        return view('livewire.bagian-page')->layout('app');
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
        Bagian::create([
            'nama' => $this->nama,
        ]);
        $this->createPage = false;
    }

    public function hapus($id)
    {
        $data = Bagian::where('id', $id)->first();
        $data->delete();

        $this->emit('success', ['pesan' => 'berhasil hapus']);
    }

    public $editPage = false;
    public $editnama;
    public $ID;

    public function editPageTrue($id)
    {
        $d = Bagian::find($id);
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
        $data = Bagian::where('id', $this->ID)->first();
        $data->nama = $this->editnama;
        $data->save();

        $this->emit('success', ['pesan' => 'berhasil edit']);
    }
}
