<?php

namespace App\Http\Livewire\Backend\Pages\Teacher;

use Livewire\Component;
use App\Models\TeacherModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $q;
    use WithPagination;
    public $paginateLesson = 5;
    protected $paginationTheme = 'bootstrap';
    public $dataId;
    public $name;
    public $picture;

    protected $listeners = [
        'render' => '$refresh',
        'confirmDelete'
    ];

    public function resetFields()
    {
        $this->dataId = '';
        $this->name = '';
        $this->picture = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($dataId)
    {
        $confirm = TeacherModel::where('uuid', $dataId)->first();
        $this->dataId = $confirm->uuid;
        $this->name = $confirm->name;
        $this->picture = $confirm->picture;
        $this->dispatchBrowserEvent('showModalDelete');
    }

    public function delete()
    {
        DB::transaction(function () {
            $deleteData = TeacherModel::find($this->dataId);
            Storage::delete($deleteData->picture);
            $deleteData->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully delete data']
            );
            $this->dispatchBrowserEvent('hideModalDelete');
            $this->resetFields();
        });
    }
    protected $queryString = ['q'];
    public function render()
    {
        return view('livewire.backend.pages.teacher.index', [
            'teachers' => Cache::remember('teachers', now(), function () {
                return TeacherModel::with('lesson')->isDesc()->whereLike($this->q)
                    ->paginate($this->paginateLesson);
            })
        ])->layout('backend.app');
    }
}
