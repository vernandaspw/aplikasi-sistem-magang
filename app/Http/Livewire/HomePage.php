<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;

class HomePage extends Component
{
    public function render()
    {
        $this->setting = Setting::find(1);
        return view('livewire.home-page')->layout('app');
    }
}
