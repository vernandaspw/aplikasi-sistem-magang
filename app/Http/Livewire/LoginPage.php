<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.login-page')->layout('app');
    }

    public $email, $password;

    public function masuk()
    {
        $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // cek akun
        $akun = User::where('email', $this->email)->first();
        if ($akun) {
            if (Hash::check($this->password, $akun->password)) {
                if ($akun->isaktif) {
                    auth()->login($akun, true);
                    redirect('dashboard');
                } else {
                    $this->emit('error', ['pesan' => 'akun anda tidak aktif']);
                }
            } else {
                $this->emit('error', ['pesan' => 'password yang anda masukan salah']);
            }
        } else {
            $this->emit('error', ['pesan' => 'Email atau akun tidak ada']);
        }
    }
}
