<?php

namespace App\Http\Livewire\Backend\Pages\Career;

use Livewire\Component;
use App\Models\CareerModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $pageTitle = 'Career';
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
        $confirm = CareerModel::where('id', $dataId)->first();
        $this->dataId = $confirm->id;
        $this->name = $confirm->name;
        $this->dispatchBrowserEvent('showModalDelete');
    }

    public function delete()
    {
        DB::transaction(function () {
            $deleteData = CareerModel::find($this->dataId);
            Storage::delete($deleteData->image);
            $deleteData->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Successfully delete data']
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
        $this->resetFields();
    }
    protected $queryString = ['q'];
    public function render()
    {
        return view('livewire.backend.pages.career.index', [
            'careers' => CareerModel::with('user')->isDesc()->whereLike($this->q)
                ->paginate($this->paginateLesson)
        ])->layout('backend.app');
    }
}
