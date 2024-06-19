<section class="mt-10">
    <div class="mx-auto max-w-screen-xl px-2 lg:px-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden">
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

                    @if ($sertifikatSelectedId)
                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete') . ': ' . count($sertifikatSelectedId) }}</x-danger-button>
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
                    <th wire:click="doSort('namaSertifikat')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Nama"
                            columnNow="namaSertifikat" />
                    </th>
                    <th wire:click="doSort('tanggalKeluaran')" class="px-4 py-3">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Tanggal"
                            columnNow="tanggalKeluaran" />
                    </th>
                    <th wire:click="doSort('lamaSertifikat')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Kadaluarsa"
                            columnNow="lamaSertifikat" />
                    </th>
                    <th wire:click="doSort('levelSertifikat')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Tingkatan"
                            columnNow="levelSertifikat" />
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
                            <x-input.checkbox wire:key='{{ $item->idSertifikat }}'
                                wire:model.live="sertifikatSelectedId" value="{{ $item->idSertifikat }}" />
                        </th>
                        <th class="px-4 py-3">{{ $item->namaSertifikat }}</th>
                        <th class="px-4 py-3">{{ $item->date_for_humans }}</th>
                        <th class="px-4 py-3">{{ $item->lamaSertifikat }} year</th>
                        <th class="px-4 py-3">{{ $item->levelSertifikat }}</th>
                        <th class="px-4 py-3">
                            <x-button.link wire:click="edit({{ $item->idSertifikat }})">Edit</x-button.link>
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
    </div>

    <!-- Save Bagian Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit Sertifikat</x-slot>

            <x-slot name="content">
                <x-input.group for="namaSertifikat" label="Nama Sertifikat" :error="$errors->first('editing.namaSertifikat')">
                    <x-input.text wire:model.defer="editing.namaSertifikat" id="namaSertifikat" placeholder="Nama" />
                </x-input.group>

                <x-input.group for="date_for_editing" label="tanggal Keluaran" :error="$errors->first('editing.date_for_editing')">
                    <x-input.date wire:model.defer="editing.date_for_editing" id="date_for_editing" />
                </x-input.group>

                <x-input.group for="lamaSertifikat" label="Kadaluarsa" :error="$errors->first('editing.lamaSertifikat')">
                    <x-input.text type="number" wire:model.defer="editing.lamaSertifikat" min="1" max="10"
                        id="lamaSertifikat" placeholder="Kadaluarsa" />
                </x-input.group>

                <x-input.group for="levelSertifikat" label="Level" :error="$errors->first('editing.levelSertifikat')">
                    <x-input.text type="number" wire:model.defer="editing.levelSertifikat" min="1"
                        max="5" id="levelSertifikat" placeholder="Kadaluarsa" />
                </x-input.group>

            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="closeModal()">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>

    {{-- Delete Bagian Model --}}
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
