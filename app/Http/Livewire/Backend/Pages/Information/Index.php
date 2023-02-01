<?php

namespace App\Http\Livewire\Backend\Pages\Information;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InformationModel;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $q;
    use WithPagination;
    public $paginateLesson = 5;
    protected $paginationTheme = 'bootstrap';
    public $dataId;
    public $name;

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
        $confirm = InformationModel::where('uuid', $dataId)->first();
        $this->dataId = $confirm->uuid;
        $this->name = $confirm->name;
        $this->dispatchBrowserEvent('showModalDelete');
    }

    public function delete()
    {
        DB::transaction(function () {
            InformationModel::find($this->dataId)->delete();
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
        return view('livewire.backend.pages.information.index', [
            'information' => InformationModel::isDesc()->where('name', 'like', '%' . $this->q . '%')
                ->orWhere('slug', 'like', '%' . $this->q . '%')
                ->paginate($this->paginateLesson)
        ])->layout('backend.app');
    }
}
