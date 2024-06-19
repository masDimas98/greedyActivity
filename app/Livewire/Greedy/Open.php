<?php

namespace App\Livewire\Greedy;

use App\Livewire\DataTable\WithCachedRows;
use App\Models\EventModel;
use App\Models\EventSertifikatModel;
use App\Models\SertifikatModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Open extends Component
{
    use WithCachedRows;

    public $showEditModal = false;
    public $perPage = 10;
    public $search = '';
    public $eventSelectedId = [];
    public $sertifikatSelectedId = [];
    public $sertifikatRadioId = '';

    public $sortDirection = 'ASC';
    public $sortColumn = 'namaEvent';

    public $eventForEditing = [];
    public $sertifikatForEditing = [];
    public $eventSertifikatForEditing = [];

    public EventModel $editing;

    public function rules(): array
    {
        // return [
        //     'sertifikatSelectedId' => 'required',
        //     'sertifikatSelectedId.*' => ['required'
        // ];
        return [
            'sertifikatRadioId' => 'required'
        ];
    }

    public function mount()
    {
        $this->editing = new EventModel();
    }

    public function edit($eventKey)
    {
        $this->sertifikatSelectedId = [];
        $this->sertifikatRadioId = '';
        $this->eventForEditing = EventModel::findOrFail($eventKey)->toArray();
        $this->sertifikatForEditing = SertifikatModel::select(DB::raw("STRCMP (sertifikat.idSertifikat, event_sertifikat.idSertifikat) as checked"), 'sertifikat.idSertifikat', 'sertifikat.namaSertifikat')
            ->leftJoin('event_sertifikat', function (JoinClause $join) {
                $join->on('sertifikat.idSertifikat', '=', 'event_sertifikat.idSertifikat')
                    ->where('event_sertifikat.idEvent', '=', $this->eventForEditing['idEvent']);
            })
            ->get()
            ->toArray();
        $this->eventSertifikatForEditing = EventSertifikatModel::select('idSertifikat')->where('idEvent', $eventKey)->get()->toArray();
        $this->sertifikatSelectedId = collect($this->eventSertifikatForEditing)
            ->map(function ($value, $key) {
                return collect($value)->values();
            })->collapse();
        $this->sertifikatRadioId = empty($this->eventSertifikatForEditing[0]['idSertifikat']) ? '' : $this->eventSertifikatForEditing[0]['idSertifikat'];

        $this->showEditModal = true;
    }

    function save()
    {
        $this->validate();

        $eventData = EventSertifikatModel::where('idEvent', $this->eventForEditing['idEvent']);
        if ($eventData->exists()) $eventData->delete();

        // foreach ($this->sertifikatSelectedId as $value) {
        //     EventSertifikatModel::insert([
        //         'idEvent' => $this->eventForEditing['idEvent'],
        //         'idSertifikat' => $value
        //     ]);
        // };

        EventSertifikatModel::insert([
            'idEvent' => $this->eventForEditing['idEvent'],
            'idSertifikat' => $this->sertifikatRadioId
        ]);

        $this->sertifikatSelectedId = [];
        $this->sertifikatRadioId = '';
        $this->eventForEditing = [];
        $this->sertifikatForEditing = [];
        $this->eventSertifikatForEditing = [];
        $this->showEditModal = false;
    }

    public function delete()
    {
        if (count($this->eventSelectedId)) {
            foreach ($this->eventSelectedId as $value) {
                EventSertifikatModel::where('idEvent', $value)->delete();
            }
        }

        $this->eventSelectedId = [];
        $this->dispatch('close-modal', 'confirm-open-deletion');
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
        $query = EventModel::select(
            'event.*',
            DB::raw('GROUP_CONCAT(IFNULL(sertifikat.namaSertifikat, null)) as daftarsertifikat')
        )
            ->leftJoin('event_sertifikat', function (JoinClause $join) {
                $join->on('event.idEvent', '=', 'event_sertifikat.idEvent');
            })
            ->join('sertifikat', 'event_sertifikat.idSertifikat', '=', 'sertifikat.idSertifikat', 'left')
            ->where('event.status', 'open')
            ->where('event.namaEvent', 'like', "%{$this->search}%")
            ->orWhere(function (Builder $builder) {
                $builder->where('event.jumlahOrang', 'like', "%{$this->search}%")
                    ->where('event.status', 'open');
            })
            ->groupBy('event.idEvent')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.greedy.open', [
            'data' => $query
        ]);
    }
}
