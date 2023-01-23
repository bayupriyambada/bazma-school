<?php

namespace App\Http\Livewire\Backend\Pages\GalleryImages;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryImagesModel;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    public $dataId;
    public $name;
    public $description;
    public $lesson_uuid;
    public $picture;
    public $oldPicture;
    public $publicData;

    use WithFileUploads;

    public function mount($uuid)
    {
        $this->publicData = GalleryImagesModel::where('uuid', $uuid)->first();
        $this->dataId = $this->publicData->uuid;
        $this->name = $this->publicData->name;
        $this->oldPicture = $this->publicData->picture;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1|max:100',
            'picture' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        $pictures = $this->publicData->picture;
        if ($this->picture) {
            $image_path = public_path("storage/" . $this->oldPicture);
            if ($this->picture != null && File::exists($image_path)) {
                File::delete($image_path);
                $pictures = $this->picture->store('gallery-images', 'public');
            }
        }

        $this->publicData->update([
            'name' => $this->name,
            'picture' => $pictures,
            'user_id' => auth()->user()->id,
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Successfully updated Gallery Images!']
        );
        return redirect()->route('pages.gallery.images.index');
    }
    public function render()
    {
        return view('livewire.backend.pages.gallery-images.edit')->layout('backend.app');
    }
}
