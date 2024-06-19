<?php

namespace App\Livewire\Master;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithSorting;
use App\Models\EventModel;
use App\Models\PenugasanModel;
use Livewire\Component;

class Event extends Component
{
    use WithCachedRows, WithSorting, WithBulkActions, WithCachedRows;

    public $showEditModal = false;
    public $perPage = 10;
    public $search = '';
    public $eventSelectedId = [];

    public $creatingData = true;
    protected $statusBefore = '';

    public $sortDirection = 'ASC';
    public $sortColumn = 'namaEvent';

    public EventModel $editing;

    public function mount()
    {
        $this->editing = new EventModel();
        $this->creatingData = true;
    }

    public function rules(): array
    {
        return [
            'editing.namaEvent' => 'required|min:3',
            'editing.jumlahOrang' => 'required',
            'editing.tgl_mulai_for_editing' => 'required',
            'editing.tgl_selesai_for_editing' => 'required|after_or_equal:' . $this->editing->tgl_mulai_for_editing,
            'editing.status' => 'required|in:' . collect(EventModel::STATUSES)->keys()->implode(',')
        ];
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = new EventModel();

        $this->creatingData = true;
        $this->showEditModal = true;
    }

    public function edit(EventModel $eventModel)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($eventModel)) $this->editing = $eventModel;

        $this->statusBefore = $this->editing->status;
        $this->creatingData = false;
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->statusBefore !== 'open') {
            if ($this->editing->status == 'open') {
                $this->dispatch('open-modal', 'confirm-status-change');
                return;
            }
        }

        $this->editing->save();

        $this->statusBefore = '';
        $this->creatingData = true;
        $this->showEditModal = false;
    }

    public function saveWithStatus()
    {
        $this->validate();

        PenugasanModel::where('idEvent', $this->editing->idEvent)->delete();
        $this->editing->save();

        $this->statusBefore = '';
        $this->dispatch('close-modal', 'confirm-status-change');
        $this->creatingData = true;
        $this->showEditModal = false;
    }

    public function delete()
    {
        if (count($this->eventSelectedId)) {
            for ($i = 0; $i < count($this->eventSelectedId); $i++) {
                EventModel::find($this->eventSelectedId)->delete();
            }
        }

        $this->eventSelectedId = [];
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
        return view('livewire.master.event', [
            'data' => EventModel::search($this->search)
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->paginate($this->perPage),
            'statuses' => EventModel::STATUSES
        ]);
    }
}
