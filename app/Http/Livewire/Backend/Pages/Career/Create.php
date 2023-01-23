<?php

namespace App\Http\Livewire\Backend\Pages\Career;

use Livewire\Component;
use App\Models\CareerModel;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $pageTitle = 'Create Career';
    public $name;
    public $content;
    public $registration_deadline;
    public $link_url;
    public $image;
    use WithFileUploads;

    public function resetFields()
    {
        $this->name = '';
        $this->content = '';
        $this->image = '';
        $this->registration_deadline = '';
        $this->link_url = '';
    }

    public function create()
    {
        DB::transaction(function () {
            $validatedData = $this->validate([
                'name' => 'required|min:1|max:150',
                'content' => 'required|min:1|max:5000',
                'registration_deadline' => 'required|date',
                'link_url' => 'required',
                'image' => 'required|max:1024|mimes:jpg,png,jpeg',
            ]);

            CareerModel::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'content' => $this->content,
                'registration_deadline' => $this->registration_deadline,
                'link_url' => $this->link_url,
                'user_id' => auth()->user()->id,
                'image' =>   $validatedData['image'] = $this->image->store('career-images', 'public')
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully added data!']
            );
            return redirect()->route('pages.career.index');
        });
        $this->resetFields();
    }
    public function render()
    {
        return view('livewire.backend.pages.career.create')->layout('backend.app');
    }
}
