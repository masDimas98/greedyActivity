<?php

namespace App\Livewire\Greedy;

use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\Greedy\WithActivities;
use App\Models\EventModel;
use App\Models\EventSertifikatModel;
use App\Models\PenugasanModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Ready extends Component
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

    public function doGreedyActivity()
    {
        $this->spinnerLoading = true;

        $jumlahDibutuhkan = EventModel::select(
            DB::raw('SUM(jumlahOrang) as jumlah'),
            'event_sertifikat.idSertifikat'
        )
            ->join('event_sertifikat', 'event_sertifikat.idEvent', '=', 'event.idEvent')
            ->where('event.status', 'open')
            ->groupBy('event_sertifikat.idSertifikat')
            ->orderBy('event.idEvent');

        $listSertifikatdiButuhkan = collect($jumlahDibutuhkan->get()->toArray())
            ->map(function ($value, $key) {
                return collect($value['idSertifikat'])->values();
            })->collapse()->toArray();

        $jumlahAnggotaReady = DB::select('SELECT lt.nip, lt.idSertifikat, iFNULL(
            (
                SELECT COUNT(status)
                FROM penugasan 
                WHERE status = "finish"
                GROUP BY lt.nip
            )
            ,0) as JUMLAH
        FROM (
            select pegawai.*,sertifikasi.idSertifikat
            from pegawai
            LEFT join sertifikasi on pegawai.nip = sertifikasi.nip
            AND sertifikasi.idSertifikat in (' . implode(",", $listSertifikatdiButuhkan) . ')) lt');

        $needGreedyActivity = array();
        $notNeedGreedyActivity = array();
        foreach ($jumlahDibutuhkan->get()->toArray() as $key => $value) {
            $totalAnggota = 0;
            $anggotaDetail = array();
            foreach ($jumlahAnggotaReady as $i => $item) {
                if ($value['idSertifikat'] == $item->idSertifikat) {
                    $totalAnggota += 1;
                    $anggotaDetail[$i] = [
                        'nip' => $item->nip,
                        'jumlah' => $item->JUMLAH
                    ];
                }
            }
            if ($totalAnggota <= (int)$value['jumlah']) {
                $needGreedyActivity[$key] = [
                    'anggotaSertifikat' => $totalAnggota,
                    'daftarAnggota' => $anggotaDetail,
                    'idSertifikat' => $value['idSertifikat']
                ];
            } else {
                $notNeedGreedyActivity[$key] = [
                    'anggotaSertifikat' => $totalAnggota,
                    'daftarAnggota' => $anggotaDetail,
                    'idSertifikat' => $value['idSertifikat']
                ];
            }
        }

        $greedyActivity = new WithActivities();
        $resultGreedyActivity = array();
        foreach ($needGreedyActivity as $key => $value) {
            $arr = EventModel::select(
                'event.idEvent',
                'event.namaEvent',
                'event.jumlahOrang',
                'event.tanggalMulai',
                'event.tanggalSelesai',
                'event_sertifikat.idSertifikat',

            )
                ->join('event_sertifikat', 'event_sertifikat.idEvent', '=', 'event.idEvent')
                ->where('event.status', 'open')
                ->where('event_sertifikat.idSertifikat', $value['idSertifikat'])
                ->orderBy('event.idEvent')
                ->get()->toArray();

            $n = count($arr);
            $result = $greedyActivity->Activity($arr, $n);

            $resultGreedyActivity[$key] = [
                'idSertifikat' => $value,
                'event' => $result,
                'jumlahAnggotaReady' => $value['anggotaSertifikat'],
                'daftarAnggota' => $value['daftarAnggota'],
            ];
        }

        if (!empty($notNeedGreedyActivity)) {
            $event = EventModel::select('event.idEvent', 'event.jumlahOrang', 'event_sertifikat.idSertifikat')
                ->join('event_sertifikat', 'event.idEvent', '=', 'event_sertifikat.idEvent')
                ->where('event.status', 'open')->get();

            $break = false;
            foreach ($event as $key => $value) {
                $break = false;
                $countPenugasaOrang = 0;
                foreach ($notNeedGreedyActivity as $k => $v) {
                    if ($value->idSertifikat == $v['idSertifikat']) {
                        if ($value->jumlahOrang <= count($v['daftarAnggota'])) {
                            if (empty($notNeedGreedyActivity[$k]['daftarAnggota'])) {
                                for ($i = 0; $i < count($v['daftarAnggota']); $i++) {
                                    if ($countPenugasaOrang == $value->jumlahOrang) break;
                                    $countPenugasaOrang++;
                                    $penugasanCreate = array(
                                        'nip' => $v['daftarAnggota'][$i]['nip'],
                                        'idEvent' => $value->idEvent,
                                        'status' => 'ready'
                                    );
                                    PenugasanModel::created($penugasanCreate);
                                    unset($needGreedyActivity[$k]['daftarAnggota'][$i]);
                                }
                            } else {
                                $break = true;
                            }
                        } else {
                            $break = true;
                            break;
                        }
                    }
                    if ($break) break;
                }
                if (!$break) {
                    EventModel::where('idEvent', $value->idEvent)->update(['status' => 'ready']);
                }
            }
        }

        if (!empty($needGreedyActivity)) {
            $break = false;
            foreach ($resultGreedyActivity as $key => $value) {
                $break = false;
                foreach ($value['event'] as $keyEvent => $event) {
                    $countPenugasaOrang = 0;
                    foreach ($value['daftarAnggota'] as $keyAnggota => $anggota) {
                        if ($countPenugasaOrang == $event['jumlahOrang']) break;
                        if ($event['jumlahOrang'] <= count($value['daftarAnggota'])) {
                            if (!empty($resultGreedyActivity[$key]['daftarAnggota'])) {
                                $countPenugasaOrang++;
                                if ($break) break;
                                $penugasanCreate = array(
                                    'nip' => $anggota['nip'],
                                    'idEvent' => $event['idEvent'],
                                    'status' => 'ready'
                                );
                                PenugasanModel::create($penugasanCreate);
                                unset($resultGreedyActivity[$key]['daftarAnggota'][$keyAnggota]);
                            } else {
                                $break = true;
                                break;
                            }
                        } else {
                            $break = true;
                            break;
                        }
                    }
                    if (!$break) {
                        EventModel::where('idEvent', $value['event'])->update(['status' => 'ready']);
                    }
                }
            }
        }

        $this->spinnerLoading = false;
    }

    public function penugasan($eventKey)
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
        EventModel::where('idEvent', $this->eventForDetail['idEvent'])->update(['status' => 'process']);
        foreach ($this->penugasanForDetail as $value) {
            PenugasanModel::where('idPenugasan', $value['idPenugasan'])->update(['status' => 'process']);
        }
        $this->showEditModal = false;
        return redirect()->route('greedy.event');
    }

    public function delete()
    {
        if (count($this->eventSelectedId)) {
            foreach ($this->eventSelectedId as $value) {
                PenugasanModel::where('idEvent', $value)->delete();
                EventModel::where('idEvent', $value)->update(['status' => 'open']);
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
            ->where('event.status', 'ready')
            ->where('event.namaEvent', 'like', "%{$this->search}%")
            ->orWhere(function (Builder $builder) {
                $builder->where('event.jumlahOrang', 'like', "%{$this->search}%")
                    ->where('event.status', 'ready');
            })
            ->groupBy('event.idEvent')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.greedy.ready', [
            'data' => $query
        ]);
    }
}