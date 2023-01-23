<?php

namespace App\Http\Livewire\Backend\Pages\Gallery;

use Livewire\Component;
use App\Models\GaleryModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $q;
    use WithPagination;
    public $paginate = 5;
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
        $confirm = GaleryModel::where('uuid', $dataId)->first();
        $this->dataId = $confirm->uuid;
        $this->name = $confirm->name;
        $this->dispatchBrowserEvent('showModalDelete');
    }

    public function delete()
    {
        DB::transaction(function () {
            GaleryModel::find($this->dataId)->delete();
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
        return view('livewire.backend.pages.gallery.index', [
            'galleries' => GaleryModel::isDesc()->where('name', 'like', '%' . $this->q . '%')
                ->paginate($this->paginate)
        ])->layout('backend.app');
    }
}
