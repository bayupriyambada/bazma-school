<?php

namespace App\Http\Livewire\Backend\Pages\Agenda;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.agenda.index')->layout('backend.app');
    }
}
