<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\TeacherModel;
use Livewire\Component;

class TeacherPage extends Component
{
    public $pageTitle = 'Teacher';
    public function render()
    {
        return view('livewire.frontend.pages.teacher-page', [
            'teachers' => TeacherModel::with('lesson')->isDesc()->get()
        ])->layout('frontend.app');
    }
}
