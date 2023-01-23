<?php

namespace App\Http\Livewire\Backend\Pages\Career;

use Livewire\Component;
use App\Models\CareerModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    public $careerEdit;
    public $pageTitle = 'Career';

    public $dataId;
    public $name;
    public $content;
    public $registration_deadline;
    public $link_url;
    public $image;
    public $slug;
    public $oldImage;

    use WithFileUploads;

    public function mount($slug)
    {
        $this->careerEdit = CareerModel::where('slug', $slug)->first();
        $this->dataId = $this->careerEdit->id;
        $this->name = $this->careerEdit->name;
        // $this->slug = $this->careerEdit->slug;
        $this->content = $this->careerEdit->content;
        $this->oldImage = $this->careerEdit->image;
        $this->registration_deadline = $this->careerEdit->registration_deadline;
        $this->link_url = $this->careerEdit->link_url;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1|max:100',
            'content' => 'required',
            'registration_deadline' => 'required',
            'link_url' => 'required',
            'image' => 'nullable|max:1024|mimes:jpg,png,jpeg',
        ]);
        $pictures = $this->careerEdit->image;
        if ($this->image) {
            $image_path = public_path("storage/" . $this->oldImage);
            if ($this->image != null && File::exists($image_path)) {
                File::delete($image_path);
                $pictures = $this->image->store('career-images', 'public');
            }
        }

        $this->careerEdit->update([
            'name' => $this->name,
            'content' => $this->content,
            'registration_deadline' => $this->registration_deadline,
            'link_url' => $this->link_url,
            'image' => $pictures,
            'user_id' => auth()->user()->id
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Successfully updated data!']
        );
        return redirect()->route('pages.career.index');
    }
    public function render()
    {
        return view('livewire.backend.pages.career.edit')->layout('backend.app');
    }
}
