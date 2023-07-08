<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UbahPasswordPage extends Component
{
    public function render()
    {
        return view('livewire.ubah-password-page')->layout('app');
    }
    public $password_lama, $password_baru, $password_confirm;

    public function simpan()
    {
        $id = auth()->user()->id;

        $user = User::where('id', $id)->first();

        if (Hash::check($this->password_lama, $user->password)) {
            if ($this->password_baru == $this->password_confirm) {
                $user->update([
                    'password' => Hash::make($this->password_baru)
                ]);
                $this->emit('success', ['pesan' => 'Berhasil diubah']);
            } else {
                $this->emit('error', ['pesan' => 'Password baru tidak sama']);

            }
        } else {
            $this->emit('error', ['pesan' => 'Password lama salah']);
        }
    }
}
