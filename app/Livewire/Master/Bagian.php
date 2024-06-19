<?php

namespace App\Livewire\Master;

use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Livewire\DataTable\WithBulkActions;
use App\Models\BagianModel;
use Livewire\Component;

class Bagian extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    public $perPage = 10;
    public $showFilters = false;
    public $search = '';
    public $showEditModal = false;
    public $bagianSelectedId = [];

    public $sortDirection = "ASC";
    public $sortColumn = 'namaBagian';

    public BagianModel $editing;

    public function mount()
    {
        $this->editing = new BagianModel();
    }

    public function rules(): array
    {
        return [
            'editing.namaBagian' => 'required',
            'editing.keterangan' => 'required',
        ];
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = new BagianModel();

        $this->showEditModal = true;
    }

    public function edit(BagianModel $bagianModel)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($bagianModel)) $this->editing = $bagianModel;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;
    }

    public function delete()
    {
        if (count($this->bagianSelectedId)) {
            for ($i = 0; $i < count($this->bagianSelectedId); $i++) {
                BagianModel::find($this->bagianSelectedId[$i])->delete();
            }
        }

        $this->bagianSelectedId = [];
        $this->dispatch('close-modal', 'confirm-user-deletion');
    }

    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.master.bagian', [
            'data' => BagianModel::search($this->search)
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
