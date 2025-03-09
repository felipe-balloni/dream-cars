@props(['item', 'wireModel' => null, 'name' => 'option'])

<div class="flex gap-3">
    <label for="{{ $name . '-' . $item->id }}" class="flex gap-3 items-center cursor-pointer">
        <input id="{{ $name . '-' . $item->id }}"
               name="{{ $name }}[]"
               value="{{ $item->id }}"
               type="checkbox"
               {{ $wireModel ? "wire:model.live={$wireModel}" : '' }}
               class="peer size-4 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">

        {{-- Ícone Check (CSS controlado por peer) --}}
        <svg class="pointer-events-none absolute size-4 stroke-white hidden peer-checked:block" viewBox="0 0 14 14"
             fill="none">
            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="text-sm text-gray-500 peer-checked:font-semibold peer-checked:text-gray-900">
            {{ $item->name }}
        </span>
    </label>
</div>
