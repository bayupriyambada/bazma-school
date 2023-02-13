<?php

namespace App\Http\Livewire\Frontend\Pages\Home;

use Livewire\Component;
use App\Models\GaleryModel;

class GalleryVideosComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.home.gallery-videos-component', [
            'galleryVideos' => GaleryModel::isDesc()->take(3)->get(),
        ])->layout('frontend.app');
    }
}
