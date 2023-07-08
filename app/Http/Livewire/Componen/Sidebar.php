<?php

namespace App\Http\Livewire\Componen;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.componen.sidebar');
    }

    public function logout()
    {
        auth()->logout();

        redirect('/');
    }
}
