<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\InformationModel;
use Livewire\Component;
use Livewire\WithPagination;

class InformationPage extends Component
{
    public $pageTitle = 'Information';
    use WithPagination;

    public function render()
    {
        return view('livewire.frontend.pages.information-page', [
            'informations' => InformationModel::isDesc()->select('name', 'description', 'created_at', 'slug')->paginate(12)
        ])->layout('frontend.app');
    }
}
