<?php

namespace App\Http\Livewire\Frontend\Pages\Home;

use Livewire\Component;
use App\Models\GalleryImagesModel;

class GalleryImagesComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.home.gallery-images-component', [
            'galleryImage' => GalleryImagesModel::isDesc()->select('name', 'picture', 'created_at')->take(3)->get(),
        ])->layout('frontend.app');
    }
}
