<?php

namespace App\Http\Livewire\Frontend\Pages\Home;

use Livewire\Component;
use App\Models\InformationModel;

class InformationComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.home.information-component', [
            'information' => InformationModel::isDesc()->select('name', 'created_at', 'slug')->take(4)->get(),
        ])->layout('frontend.app');
    }
}
