<?php

namespace App\Http\Livewire\Backend\Pages\Information;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\InformationModel;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $name;
    public $description;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|min:1|max:150',
            'description' => 'required',
        ]);
    }
    public function create()
    {
        $this->validate([
            'name' => 'required|min:1|max:150',
            'description' => 'required',
        ]);

        DB::transaction(function () {
            InformationModel::create([
                'uuid' => (string) Str::uuid(),
                'name' => $this->name,
                'slug' => Str::slug($this->name) . '-' . Str::random(5),
                'description' => $this->description,
                'user_id' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully created data!']
            );
            return redirect()->route('pages.information.index');
        });
    }
    public function render()
    {
        return view('livewire.backend.pages.information.create')->layout('backend.app');
    }
}
