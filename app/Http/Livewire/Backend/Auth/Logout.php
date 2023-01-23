<?php

namespace App\Http\Livewire\Backend\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function handleLogout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect(url('/'));
    }
    public function render()
    {
        return view('livewire.backend.auth.logout');
    }
}
