<?php

namespace App\Http\Livewire\Frontend\Pages\Career;

use Livewire\Component;
use App\Models\CareerModel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DetailPage extends Component
{
    public $careerDetails;
    public $pageTitle = 'Career ';
    public $name;
    public $image;
    public $content;
    public $link_url;
    public $registration_deadline;
    public function mount($slug)
    {
        $this->careerDetails = CareerModel::where('slug', $slug)->firstOrfail();
        $this->name = $this->careerDetails->name;
        $this->image = $this->careerDetails->image;
        $this->content = $this->careerDetails->content;
        $this->link_url = $this->careerDetails->link_url;
        $this->registration_deadline = $this->careerDetails->registration_deadline;
    }
    public function render()
    {
        return view('livewire.frontend.pages.career.detail-page', [
            'otherCareers' => CareerModel::inRandomOrder()->where('id', '!=', $this->careerDetails->id)->take(4)->get()
        ])->layout('frontend.app');
    }
}
