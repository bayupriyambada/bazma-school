<?php

namespace App\Http\Livewire\Frontend\Pages\Home;

use Livewire\Component;
use App\Models\CareerModel;

class Careercomponent extends Component
{

    public function render()
    {
        return view('livewire.frontend.pages.home.careercomponent', [
            'otherCareers' => CareerModel::isDesc()->select('name', 'image', 'created_at', 'slug')->take(3)->get(),
        ])->layout('frontend.app');
    }
}
