<?php

namespace App\Http\Livewire\Backend\Pages\Gallery;

use Livewire\Component;
use App\Models\GaleryModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $name;
    public $video;


    public function create()
    {
        $this->validate([
            'name' => 'required|min:1',
            'video' => 'required|url',
        ]);

        DB::transaction(function () {
            GaleryModel::create([
                'uuid' => (string) Str::uuid(),
                'name' => $this->name,
                'video' => $this->video,
                'user_id' => auth()->user()->id
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully created gallery!']
            );
            return redirect()->route('pages.gallery.index');
        });
    }
    public function render()
    {
        return view('livewire.backend.pages.gallery.create')->layout('backend.app');
    }
}
