<?php

namespace App\Livewire\Master;

use App\Livewire\DataTable\WithCachedRows;
use App\Models\SertifikatModel;
use Livewire\Component;

class Sertifikat extends Component
{
    use WithCachedRows;

    public $perPage = 10;
    public $search = '';
    public $showEditModal = false;
    public $sertifikatSelectedId = [];

    public $sortDirection = "ASC";
    public $sortColumn = "namaSertifikat";

    public SertifikatModel $editing;

    public function mount()
    {
        $this->editing = new SertifikatModel();
    }

    public function rules(): array
    {
        return [
            'editing.namaSertifikat' => 'required',
            'editing.date_for_editing' => 'required',
            'editing.lamaSertifikat' => 'required',
            'editing.levelSertifikat' => 'required'
        ];
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = new SertifikatModel();

        $this->showEditModal = true;
    }

    public function edit(SertifikatModel $sertifikatModel)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($sertifikatModel)) $this->editing = $sertifikatModel;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;
    }

    function delete()
    {
        if (count($this->sertifikatSelectedId)) {
            for ($i = 0; $i < count($this->sertifikatSelectedId); $i++) {
                SertifikatModel::find($this->sertifikatSelectedId[$i])->delete();
            }
        }

        $this->sertifikatSelectedId = [];
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
        return view('livewire.master.sertifikat', [
            'data' => $this->editing->search($this->search)
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
