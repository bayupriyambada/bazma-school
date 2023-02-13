<?php

namespace App\Http\Livewire\Frontend\Pages\Information;

use App\Models\InformationModel;
use Livewire\Component;

class DetailPage extends Component
{
    public $details;
    // public $pageTitle = 'Information ';
    public $name;
    public $slug;
    public $description;
    public function mount($slug)
    {
        $this->details = InformationModel::where('slug', $slug)->select('name', 'slug', 'description')->firstOrfail();
        $this->name = $this->details->name;
        $this->slug = $this->details->slug;
        $this->description = $this->details->description;
    }
    public function render()
    {
        return view('livewire.frontend.pages.information.detail-page')->layout('frontend.app');
    }
}
