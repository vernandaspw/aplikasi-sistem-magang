<?php

namespace App\Http\Livewire\Componen;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.componen.navbar');
    }

    public function logout()
    {
        auth()->logout();

        redirect('/');
    }
}
