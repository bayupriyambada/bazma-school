<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\VisionMisionModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class VisionMision extends Component
{
    public $content;

    protected $listeners = [
        'autoUpdate'      => '$refresh',
        'refreshComponent'  => '$refresh',
    ];

    public function mount()
    {
        $donation =  VisionMisionModel::where('uuid', '4032c9a7-0159-4ec9-a982-1039fae56ede')->first();
        $this->content = $donation->content;
    }

    public function autoUpdate()
    {
        DB::transaction(function () {
            $contents = VisionMisionModel::where('uuid', '4032c9a7-0159-4ec9-a982-1039fae56ede')->first();
            $contents->update([
                'content' => $this->content
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully update vision & mission!']
            );
        });
    }
    public function render()
    {
        return view('livewire.backend.pages.vision-mision')->layout('backend.app');
    }
}
