@props(['filter'])

<span
    class="m-1 inline-flex items-center rounded-full border border-gray-200 bg-white py-1.5 pr-2 pl-3 text-sm font-medium text-gray-900"
>
    <span class="block">{{ $filter['name'] }}</span>
    <button
        wire:click="removeFilter('{{ $filter['type'] }}', {{ $filter['id'] }})"
        type="button"
        class="ml-1 inline-flex size-4 shrink-0 rounded-full p-1 text-gray-400 hover:bg-gray-200 hover:text-gray-500"
    >
        <span class="sr-only">{{ __('Remove filter') }}</span>
        <svg class="size-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"/>
        </svg>
    </button>
</span>
