<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function handleLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = array('email' => $this->email, 'password' => $this->password);
        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard');
        }
        // if (auth()->guard('administrator')->attempt(array('email' => $this->email, 'password' => $this->password))) {
        //     return redirect(route('dashboard'));
        //     // $this->dispatchBrowserEvent(
        //     //     'alert',
        //     //     ['type' => 'success',  'message' => 'Berhasil login dengan akun anda.']
        //     // );
        // } else {
        //     // $this->dispatchBrowserEvent(
        //     //     'alert',
        //     //     ['type' => 'danger',  'message' => 'Gagal login dengan akun anda.']
        //     // );
        // }
    }
    public function render()
    {
        return view('livewire.frontend.auth.login')->layout('frontend.auth.app');
    }
}
