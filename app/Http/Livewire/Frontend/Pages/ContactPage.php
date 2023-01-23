<?php

namespace App\Http\Livewire\Frontend\Pages;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ContactModel;
use Illuminate\Support\Facades\DB;

class ContactPage extends Component
{
    public $pageTitle = 'Contact';
    public $name;
    public $subjects;
    public $email;
    public $description;

    protected $listeners = [
        'create' => '$refresh'
    ];

    public function resetFields()
    {
        $this->name = '';
        $this->subjects = '';
        $this->email = '';
        $this->description = '';
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|min:1|max:100',
            'subjects' => 'required|min:1|max:50',
            'email' => 'required|email',
            'description' => 'required|min:5|max:200',
        ]);

        DB::transaction(function () {
            ContactModel::create([
                'uuid' => (string) Str::uuid(),
                'name' => $this->name,
                'subjects' => $this->subjects,
                'email' => $this->email,
                'description' => $this->description,
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully sent informational message']
            );
            return redirect()->back();
        });
        $this->name = '';
        $this->subjects = '';
        $this->email = '';
        $this->description = '';
    }
    public function render()
    {
        return view('livewire.frontend.pages.contact-page')->layout('frontend.app');
    }
}
