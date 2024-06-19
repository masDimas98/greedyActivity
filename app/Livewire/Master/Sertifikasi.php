<?php

namespace App\Livewire\Master;

use App\Livewire\DataTable\WithCachedRows;
use App\Models\PegawaiModel;
use App\Models\SertifikasiModel;
use App\Models\SertifikatModel;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Sertifikasi extends Component
{
    use WithCachedRows;

    public $perPage = 10;
    public $search = '';
    public $showEditModal = false;
    public $sertifikasiSelectedId = [];
    public $sertifikatSelectedId = [];
    public $sertifikatRadioId = '';

    public $sortDirection = 'ASC';
    public $sortColumn = 'nip';

    public $pegawaiForEditing = [];
    public $sertifikatForEditing = [];
    public $sertifikasiForEditing = [];

    public SertifikasiModel $editing;

    public function rules(): array
    {
        // return [
        //     'sertifikatSelectedId' => 'required',
        //     'sertifikatSelectedId.*' => ['required']
        // ];
        return [
            'sertifikatRadioId' => 'required',
        ];
    }

    public function mount()
    {
        $this->editing = new SertifikasiModel();
    }

    public function edit($pegawaiKey)
    {
        $this->sertifikatSelectedId = [];
        $this->sertifikatRadioId = '';
        $this->pegawaiForEditing = PegawaiModel::findOrFail($pegawaiKey)->toArray();
        $this->sertifikatForEditing = SertifikatModel::select(DB::raw("STRCMP (sertifikat.idSertifikat, sertifikasi.idSertifikat) as checked"), 'sertifikat.idSertifikat', 'sertifikat.namaSertifikat')
            ->leftJoin('sertifikasi', function (JoinClause $join) {
                $join->on('sertifikat.idSertifikat', '=', 'sertifikasi.idSertifikat')
                    ->where('sertifikasi.nip', '=', $this->pegawaiForEditing['nip']);
            })
            ->get()
            ->toArray();
        $this->sertifikasiForEditing = SertifikasiModel::select('idSertifikat')->where('nip', $pegawaiKey)->get()->toArray();
        $this->sertifikatSelectedId = collect($this->sertifikasiForEditing)
            ->map(function ($value, $key) {
                return collect($value)->values();
            })->collapse();
        $this->sertifikatRadioId = empty($this->sertifikasiForEditing[0]['idSertifikat']) ? '' : $this->sertifikasiForEditing[0]['idSertifikat'];

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $pegawaiData = SertifikasiModel::where('nip', $this->pegawaiForEditing['nip']);
        if ($pegawaiData->exists()) $pegawaiData->delete();

        // foreach ($this->sertifikatSelectedId as $value) {
        //     SertifikasiModel::insert([
        //         'nip' => $this->pegawaiForEditing['nip'],
        //         'idSertifikat' => $value
        //     ]);
        // };
        SertifikasiModel::insert([
            'nip' => $this->pegawaiForEditing['nip'],
            'idSertifikat' => $this->sertifikatRadioId
        ]);

        $this->sertifikatSelectedId = [];
        $this->sertifikatRadioId = '';
        $this->pegawaiForEditing = [];
        $this->sertifikatForEditing = [];
        $this->sertifikasiForEditing = [];
        $this->showEditModal = false;
    }

    public function delete()
    {
        if (count($this->sertifikasiSelectedId)) {
            foreach ($this->sertifikasiSelectedId as $value) {
                SertifikasiModel::where('nip', $value)->delete();
            }
        }

        $this->sertifikasiSelectedId = [];
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
        $query = PegawaiModel::select(
            'pegawai.nip',
            'pegawai.namaPegawai',
            DB::raw('GROUP_CONCAT(IFNULL(sertifikat.namaSertifikat, null)) as daftarsertifikat')
        )
            ->join('sertifikasi', 'sertifikasi.nip', '=', 'pegawai.nip', 'left')
            ->join('sertifikat', 'sertifikasi.idSertifikat', '=', 'sertifikat.idSertifikat', 'left')
            ->groupBy('pegawai.nip', 'pegawai.namaPegawai')
            ->where('pegawai.nip', 'like', "%{$this->search}%")
            ->orWhere('pegawai.nip', 'like', "%{$this->search}%")
            ->orWhere('pegawai.namaPegawai', 'like', "%{$this->search}%")
            ->orderby($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.master.sertifikasi', [
            'data' => $query
        ]);
    }
}
