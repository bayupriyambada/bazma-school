<?php

namespace App\Http\Livewire\Backend\Pages\Lesson;

use Livewire\Component;
use App\Models\LessonModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $code_lesson;
    public $name_lesson;

    protected $rules = [
        'code_lesson' => 'required|alpha_dash|min:1|max:6',
        'name_lesson' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        DB::transaction(function () {
            $this->validate();
            $checkCode = LessonModel::where('code_lesson', $this->code_lesson)->first();
            if (empty($checkCode->code_lesson)) {
                LessonModel::create([
                    'uuid' => (string) Str::uuid(),
                    'code_lesson' => $this->code_lesson,
                    'name_lesson' => $this->name_lesson,
                ]);

                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Successfully created lesson!']
                );
                return redirect()->route('pages.lesson.index');
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'The code ' . $checkCode->code_lesson . ' has been used in the lesson ' . $checkCode->name_lesson]
                );
                return redirect()->back();
            }
        });
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.backend.pages.lesson.create')->layout('backend.app');
    }
}
