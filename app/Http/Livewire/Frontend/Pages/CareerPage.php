<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\CareerModel;
use Livewire\Component;

class CareerPage extends Component
{
    public $pageTitle = 'Career';
    public function render()
    {
        return view('livewire.frontend.pages.career-page', [
            'careers' => CareerModel::isDesc()->get()
        ])->layout('frontend.app');
    }
}
