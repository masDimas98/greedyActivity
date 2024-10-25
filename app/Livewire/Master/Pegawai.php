<?php

namespace App\Livewire\Master;

use App\Livewire\DataTable\WithCachedRows;
use App\Models\BagianModel;
use App\Models\PegawaiModel;
use Livewire\Component;

class Pegawai extends Component
{
    use WithCachedRows;

    public $showEditModal = false;
    public $perPage = 10;
    public $search = '';
    public $pegawaiSelectedId = [];

    public $nipBefore = '';
    public $ktpBefore = '';
    public $sortColumn = 'NIP';
    public $sortDirection = 'ASC';

    public PegawaiModel $editing;

    public function mount()
    {
        $this->editing = new PegawaiModel();
    }

    public function rules(): array
    {
        return [
            'editing.nip' => 'required|unique:Pegawai,nip',
            // 'editing.ktp' => 'required|unique:Pegawai,ktp',
            'editing.namaPegawai' => 'required|min:3',
            // 'editing.namaPanggilan' => 'required|min:3',
            'editing.bagian' => 'required',
            'editing.posisiSekarang' => 'required',
            'editing.tempatLahir' => 'required',
            'editing.tgl_lahir_for_editing' => 'required',
            'editing.agamaKepercayaan' => 'required|in:' . collect(PegawaiModel::AGAMAS)->keys()->implode(','),
        ];
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = new PegawaiModel();

        $this->showEditModal = true;
    }

    public function edit(PegawaiModel $pegawaiModel)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($pegawaiModel)) $this->editing = $pegawaiModel;

        $this->nipBefore = $this->editing->nip;
        // $this->ktpBefore = $this->editing->ktp;
        $this->showEditModal = true;
    }

    public function save()
    {
        $rules = $this->rules();
        // if ($this->ktpBefore || $this->ktpBefore == $this->editing->ktp) {
        //     unset($rules['editing.ktp']);
        // }

        if ($this->nipBefore || $this->nipBefore == $this->editing->nip) {
            unset($rules['editing.nip']);
            $this->validate($rules);
        } else {
            $this->validate();
        }


        if ($this->nipBefore) {
            $data = $this->editing->toArray();
            if ($this->nipBefore == $this->editing->nip) {
                unset($data['tgl_lahir_for_editing']);
                unset($data['nip']);
            }
            if ($this->nipBefore != $this->editing->nip) {
                unset($data['tgl_lahir_for_editing']);
            }

            $this->editing->where('nip', $this->nipBefore)->update($data);

            $this->nipBefore = '';
            // $this->ktpBefore = '';

            $this->showEditModal = false;
            return;
        }

        $this->editing->save();
        $this->nipBefore = '';
        // $this->ktpBefore = '';
        $this->showEditModal = false;
    }

    public function delete()
    {
        if (count($this->pegawaiSelectedId)) {
            for ($i = 0; $i < count($this->pegawaiSelectedId); $i++) {
                PegawaiModel::find($this->pegawaiSelectedId[$i])->delete();
            }
        }

        $this->pegawaiSelectedId = [];
        $this->dispatch('close-modal', 'confirm-pegawai-deletion');
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
        return view('livewire.master.pegawai', [
            'data' => PegawaiModel::join('bagian', 'pegawai.bagian', '=', 'bagian.idBagian', 'left')
                ->search($this->search)
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->select(['pegawai.*', 'bagian.namaBagian'])
                ->paginate($this->perPage),
            'bagian' => BagianModel::select(['idBagian', 'namaBagian'])->get(),
            'agamas' => PegawaiModel::AGAMAS
        ]);
    }
}
