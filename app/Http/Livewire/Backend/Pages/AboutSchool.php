<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\AboutSchoolModel;
use Livewire\Component;

class AboutSchool extends Component
{
    public $site_title;
    public $tag_title;
    public $phone_number;
    public $address;
    public $email;
    public $location;

    public $aboutPages;

    public function mount()
    {
        $this->aboutPages = AboutSchoolModel::first();
        $this->site_title = $this->aboutPages->site_title;
        $this->tag_title = $this->aboutPages->tag_title;
        $this->phone_number = $this->aboutPages->phone_number;
        $this->address = $this->aboutPages->address;
        $this->email = $this->aboutPages->email;
        $this->location = $this->aboutPages->location;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'site_title' => 'required|min:1|max:20',
            'tag_title' => 'nullable|min:3|max:60',
            'phone_number' => 'nullable|min:3|max:15|numeric',
            'address' => 'nullable|',
            'email' => 'nullable',
            'location' => 'nullable',
        ]);
    }

    public function updateTitleAndTag()
    {
        $this->validate([
            'site_title' => 'required|min:1|max:20',
            'tag_title' => 'nullable|min:3|max:60',
            'phone_number' => 'nullable|min:3|max:15|numeric',
            'address' => 'nullable|',
            'email' => 'nullable',
            'location' => 'nullable',
        ]);

        $this->aboutPages->where('uuid', 'efde7e2d-9c0c-4743-852d-f91f89f5e768')->first()->update([
            'site_title' => $this->site_title,
            'tag_title' => $this->tag_title,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'email' => $this->email,
            'location' => $this->location,
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Successfully updated Title and Tagline!']
        );
    }
    public function render()
    {
        return view('livewire.backend.pages.about-school')->layout('backend.app');
    }
}
