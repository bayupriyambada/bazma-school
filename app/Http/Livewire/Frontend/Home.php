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
        return view('livewire.frontend.home', [
            'otherCareers' => CareerModel::isDesc()->select('name', 'image', 'created_at', 'slug')->take(3)->get(),
            'lessons' => LessonModel::isDesc()->select('name_lesson', 'code_lesson')->take(4)->get(),
            'galleryImage' => GalleryImagesModel::isDesc()->select('name', 'picture', 'created_at')->take(3)->get(),
            'information' => InformationModel::isDesc()->select('name', 'created_at')->take(4)->get(),
            'galleryVideos' => GaleryModel::isDesc()->take(3)->get(),
        ])->layout('frontend.app');
    }
}
