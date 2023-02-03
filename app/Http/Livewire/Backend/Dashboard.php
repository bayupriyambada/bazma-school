<?php

namespace App\Http\Livewire\Backend;

use App\Models\AgendaModel;
use App\Models\CareerModel;
use App\Models\GaleryModel;
use App\Models\GalleryImagesModel;
use App\Models\LessonModel;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {

        return view('livewire.backend.dashboard', [
            'career' => CareerModel::query()->count(),
            'lesson' => LessonModel::query()->count(),
            'galleryImage' => GalleryImagesModel::query()->count(),
            'galleryVideo' => GaleryModel::query()->count(),
            'agenda' => AgendaModel::query()->count(),
        ])->layout('backend.app');
    }
}
