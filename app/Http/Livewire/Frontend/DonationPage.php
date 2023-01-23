<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Donation;
use Livewire\Component;

class DonationPage extends Component
{
    public $pageTitle = 'Donation';
    public $donations;
    public function mount()
    {
        $donation =  Donation::first();
        $this->donations = $donation->content;
    }
    public function render()
    {
        return view('livewire.frontend.donation-page')->layout('frontend.app');
    }
}
