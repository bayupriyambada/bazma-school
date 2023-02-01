<?php

namespace App\Http\Livewire\Backend\Pages\Information;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\InformationModel;

class Edit extends Component
{
    public $dataId;
    public $name;
    public $description;
    public function mount($uuid)
    {
        $lessonId = InformationModel::where('uuid', $uuid)->first();
        $this->dataId = $lessonId->uuid;
        $this->name = $lessonId->name;
        $this->description = $lessonId->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1',
            'description' => 'required',
        ]);

        InformationModel::where('uuid', $this->dataId)->first()
            ->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name) . '-' . Str::random(10),
                'description' => $this->description,
                'user_id' => auth()->user()->id
            ]);

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Successfully updated data!']
        );
        return redirect()->route('pages.information.index');
    }
    public function render()
    {
        return view('livewire.backend.pages.information.edit')->layout('backend.app');
    }
}
