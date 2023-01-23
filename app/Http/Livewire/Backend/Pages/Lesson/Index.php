<?php

namespace App\Http\Livewire\Backend\Pages\Lesson;

use Livewire\Component;
use App\Models\LessonModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Http\Livewire\Backend\Pages\Lesson;

class Index extends Component
{
    public $q;
    use WithPagination;
    public $paginateLesson = 5;
    protected $paginationTheme = 'bootstrap';
    public $dataId;
    public $name_lesson;

    protected $listeners = [
        'render' => '$refresh',
        'confirmDelete'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($dataId)
    {
        $confirm = LessonModel::where('uuid', $dataId)->first();
        $this->dataId = $confirm->uuid;
        $this->name_lesson = $confirm->name_lesson;
        $this->dispatchBrowserEvent('showModalDelete');
    }

    public function delete()
    {
        DB::transaction(function () {
            LessonModel::find($this->dataId)->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully delete data']
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
    }
    protected $queryString = ['q'];
    public function render()
    {
        return view('livewire.backend.pages.lesson.index', [
            'allLessons' => LessonModel::isDesc()->where('code_lesson', 'like', '%' . $this->q . '%')
                ->orWhere('name_lesson', 'like', '%' . $this->q . '%')
                ->paginate($this->paginateLesson)
        ])->layout('backend.app');
    }
}
