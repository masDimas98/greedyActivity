<section class="mt-10">
    <div class="mx-auto max-w-screen-xl px-2 lg:px-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden">
            <div class="flex justify-center items-center mb-5">
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tightr">Data Pegawai</h3>
            </div>
            <div class="flex justify-between">
                <div class="space-x-2 flex items-center">
                    <x-input.text type="text" wire:model.live.debounce.300ms="search" placeholder="Search...." />
                </div>

                <div class="space-x-2 flex items-center">
                    <x-input.group borderless paddingless for="perPage" label="Per Page">
                        <x-input.select wire:model.live="perPage" id="perPage">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </x-input.select>
                    </x-input.group>

                    @if ($pegawaiSelectedId)
                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-pegawai-deletion')">{{ __('Delete') . ': ' . count($pegawaiSelectedId) }}</x-danger-button>
                    @endif
                    <x-button.primary wire:click="create"><x-icon.plus /> New</x-button.primary>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-300 uppercase">
                <tr>
                    <th class="pl-4 py-3">

                    </th>
                    <th wire:click="doSort('nip')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="nip" columnNow="nip" />
                    </th>
                    {{-- <th wire:click="doSort('ktp')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="KTP" columnNow="ktp" />
                    </th> --}}
                    {{-- <th class="px-4 py-3">
                        Foto
                    </th> --}}
                    <th wire:click="doSort('namaPegawai')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Nama lengkap"
                            columnNow="namaPegawai" />
                    </th>
                    {{-- <th wire:click="doSort('namaPanggilan')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Panggilan"
                            columnNow="namaPanggilan" />
                    </th> --}}
                    <th wire:click="doSort('bagian')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Bagian"
                            columnNow="bagian" />
                    </th>
                    <th wire:click="doSort('posisiSekarang')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Jabatan"
                            columnNow="posisiSekarang" />
                    </th>
                    <th wire:click="doSort('tempatLahir')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Tmp/Tgl Lahir"
                            columnNow="tempatLahir" />
                    </th>
                    <th wire:click="doSort('agamaKepercayaan')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Agama"
                            columnNow="agamaKepercayaan" />
                    </th>
                    <th class="px-4 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="border-b dark:border-gray-700">
                        <th class="pl-4 py-3">
                            <x-input.checkbox wire:key='{{ $item->nip }}' wire:model.live="pegawaiSelectedId"
                                value="{{ $item->nip }}" />
                        </th>
                        <th class="px-4 py-3">{{ $item->nip }}</th>
                        {{-- <th class="px-4 py-3">{{ $item->ktp }}</th> --}}
                        {{-- <th class="px-4 py-3">{{ $item->foto }}</th> --}}
                        <th class="px-4 py-3">{{ $item->namaPegawai }}</th>
                        {{-- <th class="px-4 py-3">{{ $item->namaPanggilan }}</th> --}}
                        <th class="px-4 py-3">{{ $item->namaBagian }}</th>
                        <th class="px-4 py-3">{{ $item->posisiSekarang }}</th>
                        <th class="px-4 py-3">{{ $item->tempatLahir }}/{{ $item->tgl_lahir_for_humans }}</th>
                        <th class="px-4 py-3">{{ $item->agamaKepercayaan }}</th>
                        <th class="px-4 py-3">
                            <x-button.link wire:click="edit('{{ $item->nip }}')">Edit</x-button.link>
                        </th>
                    </tr>
                @endforeach
                @if ($data->count() === 0)
                    <tr class="border-b dark:border-gray-700">
                        <th class="pl-4 py-3 text-center" colspan="7">
                            <span class="text-cool-gray-400 text-sm">No Data
                                found...</span>
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="py-4 px-3">
        {{ $data->links() }}
        <div class="flex">
            <div class="flex items-center mb-3">
            </div>
        </div>
    </div>

    <!-- Save Event Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">
                @if (!$editing)
                    Edit Event
                @else
                    Add Event
                @endif
            </x-slot>

            <x-slot name="content">
                <x-input.group for="nip" label="nip" :error="$errors->first('editing.nip')">
                    <x-input.text type="text" wire:model.defer="editing.nip" id="nip" placeholder="NIP" />
                </x-input.group>

                {{-- <x-input.group for="ktp" label="ktp" :error="$errors->first('editing.ktp')">
                    <x-input.text type="number" wire:model.defer="editing.ktp" id="ktp" lenght="16"
                        placeholder="KTP" />
                </x-input.group> --}}

                <x-input.group for="namaPegawai" label="namaPegawai" :error="$errors->first('editing.namaPegawai')">
                    <x-input.text wire:model.defer="editing.namaPegawai" id="namaPegawai" placeholder="Nama Lengkap" />
                </x-input.group>

                {{-- <x-input.group for="namaPanggilan" label="namaPanggilan" :error="$errors->first('editing.namaPanggilan')">
                    <x-input.text wire:model.defer="editing.namaPanggilan" id="namaPanggilan"
                        placeholder="Panggilan" />
                </x-input.group> --}}

                <x-input.group for="bagian" label="Bagian" :error="$errors->first('editing.bagian')">
                    <x-input.select wire:model.defer='editing.bagian' id="bagian">
                        <option value="">Select Bagian...</option>
                        @foreach ($bagian as $value)
                            <option value="{{ $value->idBagian }}"
                                {{ $editing->bagian == $value->idBagian ? 'selected' : '' }}>
                                {{ $value->namaBagian }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>

                <x-input.group for="posisiSekarang" label="Posisi" :error="$errors->first('editing.posisiSekarang')">
                    <x-input.text wire:model.defer="editing.posisiSekarang" id="posisiSekarang"
                        placeholder="Posisi Sekarang" />
                </x-input.group>

                <x-input.group for="tempatLahir" label="Tempat Lahir" :error="$errors->first('editing.tempatLahir')">
                    <x-input.text wire:model.defer="editing.tempatLahir" id="tempatLahir" placeholder="Tempat Lahir" />
                </x-input.group>

                <x-input.group for="tgl_lahir_for_editing" label="Tanggal Lahir" :error="$errors->first('editing.tgl_lahir_for_editing')">
                    <x-input.date wire:model.defer="editing.tgl_lahir_for_editing" id="tgl_lahir_for_editing" />
                </x-input.group>

                <x-input.group for="agamaKepercayaan" label="Agama Kepercayaan" :error="$errors->first('editing.agamaKepercayaan')">
                    <x-input.select wire:model.defer='editing.agamaKepercayaan' id="agamaKepercayaan">
                        <option value="">Select Agama...</option>
                        @foreach ($agamas as $value => $label)
                            <option value="{{ $value }}"
                                {{ $editing->agamaKepercayaan == $value ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>

            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="closeModal()">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>

    {{-- Delete Model --}}
    <x-modal name="confirm-pegawai-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="delete" class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to Delete?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</section>
