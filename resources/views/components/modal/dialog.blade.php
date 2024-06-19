@props(['id' => null, 'maxWidth' => null])

<x-modal-edit :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ $title }}
            </h2>
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right">
        {{ $footer }}
    </div>
</x-modal-edit>
