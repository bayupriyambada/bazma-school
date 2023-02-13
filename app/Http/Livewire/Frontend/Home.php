<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\CareerModel;
use App\Models\GaleryModel;
use App\Models\GalleryImagesModel;
use App\Models\InformationModel;
use App\Models\LessonModel;

class Home extends Component
{
    public $pageTitle = 'Home';
    public function render()
    {
        return view('livewire.frontend.home')->layout('frontend.app');
    }
}
