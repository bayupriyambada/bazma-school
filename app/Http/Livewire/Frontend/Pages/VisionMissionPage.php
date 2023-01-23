<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\VisionMisionModel;
use Livewire\Component;

class VisionMissionPage extends Component
{
    public $pageTitle = 'Vision & Mission';
    public $content;
    public function mount()
    {
        $contents =  VisionMisionModel::where('uuid', '4032c9a7-0159-4ec9-a982-1039fae56ede')->first();
        $this->content = $contents->content;
    }
    public function render()
    {
        return view('livewire.frontend.pages.vision-mission-page')->layout('frontend.app');
    }
}
