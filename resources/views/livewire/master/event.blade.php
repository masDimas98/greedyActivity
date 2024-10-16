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

                    @if ($eventSelectedId)
                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete') . ': ' . count($eventSelectedId) }}</x-danger-button>
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
                    <th wire:click="doSort('namaEvent')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Nama"
                            columnNow="namaEvent" />
                    </th>
                    <th wire:click="doSort('jumlahOrang')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Anggota"
                            columnNow="jumlahOrang" />
                    </th>
                    <th wire:click="doSort('tanggalMulai')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Mulai"
                            columnNow="tglMulai" />
                    </th>
                    <th wire:click="doSort('tanggalSelesai')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Selesai"
                            columnNow="tglSelesai" />
                    </th>
                    <th wire:click="doSort('status')" class="px-4 py-3 cursor-pointer">
                        <x-table.heading-sorting :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Status"
                            columnNow="status" />
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
                            <x-input.checkbox wire:key='{{ $item->idEvent }}' wire:model.live="eventSelectedId"
                                value="{{ $item->idEvent }}" />
                        </th>
                        <th class="px-4 py-3">{{ $item->namaEvent }}</th>
                        <th class="px-4 py-3">{{ $item->jumlahOrang }}</th>
                        <th class="px-4 py-3">{{ $item->tgl_mulai_for_humans }}</th>
                        <th class="px-4 py-3">{{ $item->tgl_selesai_for_humans }}</th>
                        <th class="px-4 py-3"><x-input.status :statuses="$item->status" /> </th>
                        <th class="px-4 py-3">
                            <x-button.link wire:click="edit({{ $item->idEvent }})">Edit</x-button.link>
                        </th>
                    </tr>
                @endforeach
                @empty($data)
                    <tr>
                        <th colspan="4">
                            <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                            <span class="font-medium py-8 text-cool-gray-400 text-xl">No Bagian
                                found...</span>
                        </th>
                    </tr>
                @endempty
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
                <x-input.group for="namaEvent" label="NamaEvent" :error="$errors->first('editing.namaEvent')">
                    <x-input.text wire:model.defer="editing.namaEvent" id="namaEvent" placeholder="Nama" />
                </x-input.group>

                <x-input.group for="jumlahOrang" label="Anggota" :error="$errors->first('editing.jumlahOrang')">
                    <x-input.text type="number" wire:model.defer="editing.jumlahOrang" id="jumlahOrang"
                        placeholder="Jumlah" />
                </x-input.group>

                <x-input.group for="tgl_mulai_for_editing" label="tanggal Mulai" :error="$errors->first('editing.tgl_mulai_for_editing')">
                    <x-input.date wire:model.defer="editing.tgl_mulai_for_editing" id="tgl_mulai_for_editing" />
                </x-input.group>

                <x-input.group for="tgl_selesai_for_editing" label="tanggal Selesai" :error="$errors->first('editing.tgl_selesai_for_editing')">
                    <x-input.date wire:model.defer="editing.tgl_selesai_for_editing" id="tgl_selesai_for_editing" />
                </x-input.group>

                @if ($creatingData)
                    <x-input.group for="status" label="Status" :error="$errors->first('editing.status')">
                        <x-input.select wire:model.defer='editing.status' id="status">
                            <option>Select Status...</option>
                            <option value="open">Open</option>
                        </x-input.select>
                        @if (!$editing->namaEvent)
                            <p class="text-sm tracking-tighter text-gray-500 dark:text-gray-400">Status stay
                                in
                                <i><b>Open
                                    </b></i>, while Creating New Data.
                            </p>
                        @else
                            {{-- <p class="text-yellow-600">Stay</p> --}}
                        @endif
                    </x-input.group>
                @else
                    <x-input.group for="status" label="Status" :error="$errors->first('editing.status')">
                        <x-input.select wire:model.defer='editing.status' id="status">
                            @foreach ($statuses as $value => $label)
                                <option value="{{ $value }}" {{ $editing->status == $value ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </x-input.select>
                        <p class="text-sm tracking-tighter text-gray-500  dark:text-gray-400">Status in
                            <i><b>Ready</b></i>,
                            <i><b>Processing</b></i> and <i><b>Finished
                                </b></i>. if Change to <i><b>Open
                                </b></i> Will Destroy Data Penugasan On this <i><b>Event
                                </b></i>
                        </p>
                    </x-input.group>
                @endif

            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="closeModal()">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>

    {{-- Delete Model --}}
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

    {{-- Change Status Model --}}
    <x-modal name="confirm-status-change" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="saveWithStatus" class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want change Status to Open?') }}
            </h2>

            <p class="text-sm font-medium text-gray-900 dark:text-gray-100 mt-5">
                status changes will affect assignments and delete data according to the changed event
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Yes') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
