<?php

namespace App\Http\Livewire\Backend\Pages\Gallery;

use App\Models\GaleryModel;
use Livewire\Component;

class Edit extends Component
{
    public $dataId;
    public $name;
    public $video;
    public function mount($uuid)
    {
        $lessonId = GaleryModel::where('uuid', $uuid)->first();
        $this->dataId = $lessonId->uuid;
        $this->name = $lessonId->name;
        $this->video = $lessonId->video;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1',
            'video' => 'required',
        ]);

        GaleryModel::where('uuid', $this->dataId)->first()
            ->update([
                'name' => $this->name,
                'video' => $this->video,
            ]);

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Successfully updated gallery!']
        );
        return redirect()->route('pages.gallery.index');
    }
    public function render()
    {
        return view('livewire.backend.pages.gallery.edit')->layout('backend.app');
    }
}
