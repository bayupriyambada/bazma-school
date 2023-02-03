<?php

namespace App\Http\Livewire\Frontend\Pages\Career;

use Livewire\Component;
use App\Models\CareerModel;
use Carbon\Carbon;

class DetailPage extends Component
{
    public $careerDetails;
    public $pageTitle = 'Career ';
    public $name;
    public $image;
    public $content;
    public $link_url;
    public $registration_deadline;
    public $closed;
    public function mount($slug)
    {
        $this->careerDetails = CareerModel::where('slug', $slug)->firstOrfail();
        $this->name = $this->careerDetails->name;
        $this->image = $this->careerDetails->image;
        $this->content = $this->careerDetails->content;
        $this->link_url = $this->careerDetails->link_url;
        $this->registration_deadline = $this->careerDetails->registration_deadline;
        $this->closed = Carbon::today();
        $registrationDate = Carbon::parse($this->registration_deadline);
        // $this->closed = $date <= $registrationDate ? "Open Career" : "Closed Career";
        // if ($this->closed <= $registrationDate) {
        //     dd("buka");
        // } else {
        //     dd('tutup');
        // }
    }
    public function render()
    {
        return view('livewire.frontend.pages.career.detail-page', [
            'otherCareers' => CareerModel::inRandomOrder()->where('id', '!=', $this->careerDetails->id)->take(4)->get()
        ])->layout('frontend.app');
    }
}
