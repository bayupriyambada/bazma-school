<?php

namespace App\Http\Livewire\Backend\Pages\Teacher;

use Livewire\Component;
use App\Models\LessonModel;
use App\Models\TeacherModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    public $dataId;
    public $name;
    public $description;
    public $lesson_uuid;
    public $picture;
    public $newPicture;
    public $oldPicture;
    public $teachers;

    use WithFileUploads;

    public function mount($uuid)
    {
        $this->teachers = TeacherModel::with('lesson')->where('uuid', $uuid)->first();
        $this->dataId = $this->teachers->uuid;
        $this->name = $this->teachers->name;
        $this->description = $this->teachers->description;
        $this->oldPicture = $this->teachers->picture;
        $this->lesson_uuid = $this->teachers->lesson_uuid;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1|max:100',
            'description' => 'nullable',
            'lesson_uuid' => 'required',
            'picture' => 'nullable|max:1024|mimes:jpg,png,jpeg',
        ]);
        $pictures = $this->teachers->picture;
        if ($this->picture) {
            $image_path = public_path("storage/" . $this->oldPicture);
            if ($this->picture != null && File::exists($image_path)) {
                File::delete($image_path);
                $pictures = $this->picture->store('pictures-teacher', 'public');
            }
        }

        $this->teachers->update([
            'name' => $this->name,
            'description' => $this->description,
            'lesson_uuid' => $this->lesson_uuid,
            'picture' => $pictures
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Successfully updated data!']
        );
        return redirect()->route('pages.teacher.index');
    }
    public function render()
    {

        return view('livewire.backend.pages.teacher.edit', [
            'lessons' => LessonModel::get()
        ])->layout('backend.app');
    }
}
