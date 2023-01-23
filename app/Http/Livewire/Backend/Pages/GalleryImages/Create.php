<?php

namespace App\Http\Livewire\Backend\Pages\GalleryImages;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\GalleryImagesModel;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $name;
    public $picture;
    use WithFileUploads;

    public function resetFields()
    {
        $this->name = '';
        $this->picture = '';
    }

    public function create()
    {
        DB::transaction(function () {
            $validatedData = $this->validate([
                'name' => 'required|min:1|max:100',
                'picture' => 'max:1024|mimes:jpg,png,jpeg',
            ]);

            GalleryImagesModel::create([
                'uuid' => (string) Str::uuid(),
                'name' => $this->name,
                'user_id' => auth()->user()->id,
                'picture' =>   $validatedData['picture'] = $this->picture->store('gallery-images', 'public')
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully created Gallery Images!']
            );
            return redirect()->route('pages.gallery.images.index');
            $this->resetFields();
        });
    }
    public function render()
    {
        return view('livewire.backend.pages.gallery-images.create')->layout('backend.app');
    }
}
