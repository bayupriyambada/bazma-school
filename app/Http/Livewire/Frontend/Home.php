<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\CareerModel;
use App\Models\LessonModel;

class Home extends Component
{
    public $pageTitle = 'Home';
    public function render()
    {
        return view('livewire.frontend.home', [
            'otherCareers' => CareerModel::isDesc()->take(3)->get(),
            'lessons' => LessonModel::isDesc()->take(6)->get(),
        ])->layout('frontend.app');
    }
}
