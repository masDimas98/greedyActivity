<section class="mt-10">
    <div class="mx-auto max-w-screen-xl px-2 lg:px-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden">
            <div class="flex justify-center items-center mb-5">
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tightr">Sertifikat Pegawai</h3>
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

                    @if ($sertifikasiSelectedId)
                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete') . ': ' . count($sertifikasiSelectedId) }}</x-danger-button>
                    @endif
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
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="NIP" columnNow="nip" />
                    </th>
                    <th wire:click="doSort('namaPegawai')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Nama"
                            columnNow="namaPegawai" />
                    </th>
                    <th wire:click="doSort('daftarsertifikat')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Sertifkat"
                            columnNow="daftarsertifikat" />
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
                            @if (!empty($item->daftarsertifikat))
                                <x-input.checkbox wire:key='{{ $item->nip }}' wire:model.live="sertifikasiSelectedId"
                                    value="{{ $item->nip }}" />
                            @endif
                        </th>
                        <th class="px-4 py-3">{{ $item->nip }}</th>
                        <th class="px-4 py-3">{{ $item->namaPegawai }}</th>
                        <th class="px-4 py-3">{{ $item->daftarsertifikat }}</th>
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
        <div class="flex">
            <div class="flex items-center mb-3">
            </div>
        </div>
    </div>

    <!-- Save Sertifikasi Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit Sertifikasi</x-slot>

            <x-slot name="content">
                <x-input.group for="nip" label="Nip" :error="$errors->first('pegawaiForEditing.nip')">
                    <x-input.text disabled wire:model.defer="pegawaiForEditing.nip" id="nip" placeholder="Nama" />
                </x-input.group>

                <x-input.group for="namaPegawai" label="NamaPegawai" :error="$errors->first('pegawaiForEditing.namaPegawai')">
                    <x-input.text disabled wire:model.defer="pegawaiForEditing.namaPegawai" id="namaPegawai"
                        placeholder="Nama" />
                </x-input.group>

                <x-input.group for="sertifikat" label="Sertifikat" :inline="true" :error="$errors->first('sertifikatRadioId')">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-3 gap-y-3">
                        @foreach ($sertifikatForEditing as $item)
                            <div class="flex items-center mb-4">
                                @if ($item['checked'] === 0)
                                    <input type="radio" wire:model='sertifikatRadioId'
                                        value="{{ $item['idSertifikat'] }}" checked
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @else
                                    <input type="radio" wire:model='sertifikatRadioId'
                                        value="{{ $item['idSertifikat'] }}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @endif
                                <label for="sertifikat"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item['namaSertifikat'] }}</label>
                            </div>
                        @endforeach
                    </div>
                </x-input.group>

            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="closeModal()">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>

    {{-- Delete Sertifikasi Model --}}
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
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
