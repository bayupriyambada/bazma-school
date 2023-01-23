<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\GalleryImagesModel;
use Livewire\Component;

class GalleryImagesPage extends Component
{
    public $pageTitle = 'Gallery Images';
    public function render()
    {
        return view('livewire.frontend.pages.gallery-images-page', [
            'galleryImages' => GalleryImagesModel::isDesc()->get()
        ])->layout('frontend.app');
    }
}
