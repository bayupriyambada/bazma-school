<?php

namespace App\Http\Livewire\Frontend\Pages;

use Livewire\Component;

class StudentsPage extends Component
{
    public $pageTitle = 'Students';
    public function render()
    {
        return view('livewire.frontend.pages.students-page')->layout('frontend.app');
    }
}
