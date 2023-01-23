<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Donation as DonationModels;

class Donation extends Component
{
    public $content;

    protected $listeners = [
        'autoUpdate'      => '$refresh',
        'refreshComponent'  => '$refresh',
    ];

    public function mount()
    {
        $donation =  DonationModels::where('id', 1)->first();
        $this->content = $donation->content;
    }

    public function autoUpdate()
    {
        DB::transaction(function () {
            $contents = DonationModels::where('id', 1)->first();
            $contents->update([
                'content' => $this->content
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully updated donation!']
            );
        });
    }
    public function render()
    {
        return view('livewire.backend.pages.donation')->layout('backend.app');
    }
}
