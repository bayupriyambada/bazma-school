<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\GaleryModel;
use Livewire\Component;

class GalleryPage extends Component
{
    public $pageTitle = 'Gallery Video';
    public function render()
    {

        return view('livewire.frontend.pages.gallery-page', [
            'galleries' => GaleryModel::isDesc()->get()
        ])->layout('frontend.app');
    }
}
