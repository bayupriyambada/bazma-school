<?php

namespace App\Http\Livewire\Backend\Pages\Lesson;

use App\Models\LessonModel;
use Livewire\Component;

class Edit extends Component
{
    public $dataId;
    public $code_lesson;
    public $name_lesson;
    public $title;
    public function mount($uuid)
    {
        $lessonId = LessonModel::where('uuid', $uuid)->first();
        $this->dataId = $lessonId->uuid;
        $this->code_lesson = $lessonId->code_lesson;
        $this->name_lesson = $lessonId->name_lesson;
    }

    public function updateForm()
    {
        $this->validate([
            'code_lesson' => 'required|alpha_dash|min:1|max:6',
            'name_lesson' => 'required',
        ]);

        LessonModel::where('uuid', $this->dataId)->first()
            ->update([
                'code_lesson' => $this->code_lesson,
                'name_lesson' => $this->name_lesson,
            ]);

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Successfully updated lesson!']
        );
        return redirect()->route('pages.lesson.index');
    }
    public function render()
    {
        return view('livewire.backend.pages.lesson.edit')->layout('backend.app');
    }
}
