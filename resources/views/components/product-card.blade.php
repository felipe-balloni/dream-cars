@props(['product'])

<div
    class="bg-gray-100 rounded-lg px-4 lg:px-8 py-4 lg:py-8 text-black
     space-y-2 md:space-y-4 text-center select-none shadow-md h-full"
>
    <p class="font-semibold leading-4 tracking-tighter">{{ $product->brand->name }} / {{ $product->category->name }}</p>
    <div class="flex justify-center">
        <img
            src="{{ Vite::asset($product->image) }}"
            alt="Ícone 1"
            class="object-cover w-full h-full rounded-md"
        >
    </div>
    <p class="text-xs -mt-2 md:-mt-4 text-gray-500 text-left">{{ __('created_at:') }} {{$product->created_at?->diffForHumans()}}</p>
    <h3 class="text-xl font-bold md:text-lg uppercase">{{ $product->name }}</h3>
    <p class="text-lg font-bold md:text-xl">{{ __('Average Rate:') }} {{ $product->rating }}</p>
    <p class="text-sm md:text-base line-clamp-3">{{ $product->description }}</p>
</div>
