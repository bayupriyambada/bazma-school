<?php

namespace App\Http\Livewire\Frontend\Pages\Home;

use Livewire\Component;
use App\Models\LessonModel;

class SubjectsComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.home.subjects-component', [
            'lessons' => LessonModel::isDesc()->select('name_lesson', 'code_lesson')->take(4)->get(),
        ])->layout('frontend.app');
    }
}
