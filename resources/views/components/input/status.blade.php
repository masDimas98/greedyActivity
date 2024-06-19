@props(['statuses'])

@php
    switch ($statuses) {
        case 'open':
            $classes = 'text-blue-800 border-blue-800 dark:border-blue-600 dark:text-blue-400';
            break;
        case 'ready':
            $classes = 'text-yellow-800 border-yellow-800 dark:border-yellow-600 dark:text-yellow-400';
            break;
        case 'process':
            $classes = 'text-red-800 border-red-800 dark:border-red-600 dark:text-red-400';
            break;

        case 'finish':
            $classes = 'text-green-800 border-green-800 dark:border-green-600 dark:text-green-400';
            break;

        default:
            $classes = 'text-gray-800 border-gray-800 dark:border-gray-600 dark:text-gray-400';
    }
@endphp

<span
    class="bg-transparent border {{ $classes }} font-medium rounded-lg text-xs px-3 py-1.5 text-center ">{{ $statuses }}!
</span>
