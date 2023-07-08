<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\DataMagang;
use Livewire\Component;

class ChatPage extends Component
{
    public function render()
    {
        $datamagang = DataMagang::latest();
     
      

        if (auth()->user()->role == 'peserta') {
            $datamagang->where('peserta_id', auth()->user()->id);
        }
        if (auth()->user()->role == 'pembimbing') {
            $datamagang->where('pembimbing_id', auth()->user()->id);
        }

        $datamagang->where('status', 'magang')->orWhere('status', 'alumni');
        $datamagang->where('pembimbing_id', '!=', null);
        $this->data_magangs = $datamagang->get();

        // dibuat where data_magang_chat->id
        $chat = Chat::orderBy('created_at', 'desc');
        if ($this->data_magang_chat) {
            $chat->where('data_magang_id', $this->data_magang_chat->id);
        }
        $this->chats = $chat->get();


        if ($this->data_magang_chat) {
            $cs = Chat::where('data_magang_id', $this->data_magang_chat->id)->where('pengirim_id', '!=', auth()->user()->id)->where('read_at', null)->get();
            foreach ($cs as $c) {
                $c->update([
                    'read_at' => now(),
                ]);
            }
        }

        return view('livewire.chat-page')->layout('app');
    }


    public $data_magang_chat;
    public $pesan;

    public function select($id)
    {
        $data = DataMagang::where('id', $id)->first();

        $cs = Chat::where('data_magang_id', $id)->where('pengirim_id', '!=', auth()->user()->id)->where('read_at', null)->get();
        foreach ($cs as $c) {
            $c->update([
                'read_at' => now(),
            ]);
        }

        $this->data_magang_chat = $data;
    }

    public function send()
    {
        Chat::create([
            'data_magang_id' => $this->data_magang_chat->id,
            'pengirim_id' => auth()->user()->id,
            'pesan' => $this->pesan,
        ]);

        $this->pesan = null;
    }
}
