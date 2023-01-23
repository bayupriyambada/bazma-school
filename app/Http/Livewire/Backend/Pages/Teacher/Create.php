<?php

namespace App\Http\Livewire\Backend\Pages\Teacher;

use Livewire\Component;
use App\Models\LessonModel;
use App\Models\TeacherModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $name;
    public $description;
    public $lesson_uuid;
    public $picture;
    use WithFileUploads;

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->picture = '';
        $this->lesson_uuid = '';
    }

    public function create()
    {
        DB::transaction(function () {
            $validatedData = $this->validate([
                'name' => 'required|min:1|max:100',
                'description' => 'nullable',
                'lesson_uuid' => 'required',
                'picture' => 'required|max:1024|mimes:jpg,png,jpeg',
            ]);

            TeacherModel::create([
                'uuid' => (string) Str::uuid(),
                'name' => $this->name,
                'description' => $this->description,
                'lesson_uuid' => $this->lesson_uuid,
                'picture' =>   $validatedData['picture'] = $this->picture->store('pictures-teacher', 'public')
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully created lesson!']
            );
            return redirect()->route('pages.teacher.index');
            $this->resetFields();
        });
    }
    public function render()
    {
        return view('livewire.backend.pages.teacher.create', [
            'lessons' => LessonModel::get()
        ])->layout('backend.app');
    }
}
