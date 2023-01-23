<?php

namespace App\Http\Livewire\Backend\Pages\Information;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.information.index')->layout('backend.app');
    }
}
