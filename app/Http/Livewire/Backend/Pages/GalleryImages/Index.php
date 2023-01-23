<?php

namespace App\Http\Livewire\Backend\Pages\GalleryImages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GalleryImagesModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $confirm = GalleryImagesModel::where('uuid', $dataId)->first();
        $this->dataId = $confirm->uuid;
        $this->name = $confirm->name;
        $this->dispatchBrowserEvent('showModalDelete');
    }

    public function delete()
    {
        DB::transaction(function () {
            $delete = GalleryImagesModel::find($this->dataId);
            Storage::delete($delete->picture);
            $delete->delete();
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
        return view('livewire.backend.pages.gallery-images.index', [
            'galleryImages' => GalleryImagesModel::isDesc()->where('name', 'like', '%' . $this->q . '%')
                ->paginate($this->paginate)
        ])->layout('backend.app');
    }
}
