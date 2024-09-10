<?php

namespace App\Livewire\Greedy;

use App\Livewire\DataTable\WithCachedRows;
use App\Models\EventModel;
use App\Models\PenugasanModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Process extends Component
{
    use WithCachedRows;

    public $showEditModal = false;
    public $perPage = 10;
    public $search = '';
    public $eventSelectedId = [];

    public $sortDirection = 'DESC';
    public $sortColumn = 'namaEvent';

    public $eventForDetail = [];
    public $penugasanForDetail = [];

    public $spinnerLoading = false;

    public EventModel $editing;
    public EventModel $greedyActivaty;

    public function mount()
    {
        $this->editing = new EventModel();
    }

    public function finish($eventKey)
    {
        $this->eventForDetail = EventModel::select('event.idEvent', 'event.namaEvent', 'event.jumlahOrang', 'sertifikat.namaSertifikat')
            ->leftJoin('event_sertifikat', 'event.idEvent', '=', 'event_sertifikat.idEvent')
            ->leftJoin('sertifikat', 'event_sertifikat.idSertifikat', '=', 'sertifikat.idSertifikat')
            ->where('event.idEvent', $eventKey)->first()->toArray();
        $this->penugasanForDetail = PenugasanModel::select('pegawai.namaPegawai', 'penugasan.idPenugasan', 'pegawai.nip')
            ->leftJoin('pegawai', 'penugasan.nip', '=', 'pegawai.nip')
            ->where('penugasan.idEvent', $eventKey)
            ->get()->toArray();
        $this->showEditModal = true;
    }

    function save()
    {
        EventModel::where('idEvent', $this->eventForDetail['idEvent'])->update(['status' => 'finish']);
        foreach ($this->penugasanForDetail as $value) {
            PenugasanModel::where('idPenugasan', $value['idPenugasan'])->update(['status' => 'finish']);
        }
        $this->showEditModal = false;
        return redirect()->route('greedy.event');
    }

    public function delete()
    {
        if (count($this->eventSelectedId)) {
            foreach ($this->eventSelectedId as $value) {
                EventModel::where('idEvent', $value)->update(['status' => 'ready']);
                PenugasanModel::where('idEvent', $value)->update(['status' => 'ready']);
            }
        }

        $this->eventSelectedId = [];
        $this->dispatch('close-modal', 'confirm-user-deletion');
        return redirect()->route('greedy.event');
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
            ->where('event.status', 'process')
            ->where('event.namaEvent', 'like', "%{$this->search}%")
            ->orWhere(function (Builder $builder) {
                $builder->where('event.jumlahOrang', 'like', "%{$this->search}%")
                    ->where('event.status', 'process');
            })
            ->groupBy('event.idEvent')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.greedy.process', [
            'data' => $query
        ]);
    }
}
