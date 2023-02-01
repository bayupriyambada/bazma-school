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

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|min:1|max:100',
            'picture' => 'required|max:1024|mimes:jpg,png,jpeg',
        ]);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->picture = '';
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|min:1|max:100',
            'picture' => 'required|max:1024|mimes:jpg,png,jpeg',
        ]);
        DB::transaction(function ($validatedData) {

            GalleryImagesModel::create([
                'uuid' => (string) Str::uuid(),
                'name' => $this->name,
                'user_id' => auth()->user()->id,
                'picture' =>   $this->picture = $this->picture->store('gallery-images', 'public')
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
