@props(['product'])

<div
    class="bg-gray-100 rounded-lg px-4 lg:px-8 py-4 lg:py-8 text-black
     space-y-2 md:space-y-4 text-center select-none shadow-md h-full"
>
    <p class="font-semibold leading-4 tracking-tighter">{{ $product->brand->name }}</p>
    <div class="flex justify-center">
        <img
            src="{{ Vite::asset($product->image) }}"
            alt="Ícone 1"
            class="object-cover w-full h-full rounded-md"
        >
    </div>
    <p class="text-sm font-bold md:text-base text-blue-600 uppercase">{{ $product->category->name }}</p>
    <h3 class="text-xl font-bold md:text-lg uppercase">{{ $product->name }}</h3>
    <p class="text-sm md:text-base line-clamp-3">{{ $product->description }}</p>
</div>
