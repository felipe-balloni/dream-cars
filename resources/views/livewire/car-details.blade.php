{{-- Modal --}}
<div
    x-data="{ open: @entangle('modalOpen') }"
    x-show="open"
    class="fixed inset-0 bg-black/20 backdrop-blur-lg flex justify-center items-center z-50"
    @keydown.escape.window="open = false"
    @click.outside="open = false"
    x-cloak
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    x-effect="document.body.classList.toggle('overflow-hidden', open)"
>
    <div
        class="w-[1150px] h-screen transform skew-x-12 bg-red-600/70 mix-blend -z-50 absolute top-0 -left-[44rem] hidden md:block"
        style="margin: 0 139px 0 0;"></div>

    <div
        class=" md:container md:p-8 lg:p-16 bg-black/80 md:rounded-lg w-full md:max-w-11/12 h-screen md:h-max relative z-50">
        <!-- Botão de Fechar -->
        <button
            wire:click="closeModal"
            class="absolute top-2 right-2 md:top-4 md:right-4 lg:top-10 lg:right-10 group text-white z-50 ml-auto
            cursor-pointer bg-white/40 rounded-full p-2.5 shadow-md hover:bg-white/80 transition duration-300 ease-in-out"
        >
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="group-hover:rotate-180 transition-all">
                <path
                    d="M1.96878 13.4487L0.550781 12.0307L5.58145 7.00002L0.550781 2.00269L1.96878 0.584686L6.99945 5.61535L11.9968 0.584686L13.4148 2.00269L8.38411 7.00002L13.4148 12.0307L11.9968 13.4487L6.99945 8.41802L1.96878 13.4487Z"
                    fill="#231F20"/>
            </svg>
        </button>

        <!-- Verifica se o produto foi carregado -->
        @if ($product)
            <!-- Conteúdo do Modal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:mt-4 lg:mt-8 text-white">
                <!-- Imagem do Produto -->
                <div class="flex items-center justify-center bg-transparent relative overflow-hidden">
                    <div
                        class="w-full h-auto transform skew-x-12 bg-red-600 z-10 absolute top-0 -left-[310px] md:hidden"
                        style="margin: 0 139px 0 0;"></div>

                    <div
                        class="w-screen h-auto md:w-[480px] lg:w-[600px] z-20 md:z-0 flex-1 md:rounded-lg">
                        <img src="{{ Vite::asset($product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-contain md:rounded-md">
                    </div>
                </div>

                <!-- Informações do Produto -->
                <div class="relative container flex flex-col p-4 space-y-6 lg:space-y-8 z-30">
                    <div class="flex md:justify-between items-center space-x-2">
                        <p class="font-bold uppercase text-lg">{{ $product->category->name }}</p>
                        <p class="text-lg font-bold uppercase">{{ $product->brand->name }}</p>
                    </div>

                    <h2 class="text-xl md:text-2xl font-semibold uppercase">{{ $product->name }}</h2>
                    <p class="text-sm md:text-base">{{ $product->description }}</p>

                    <div class="flex items-center space-x-4">
                        <p class="text-white/80 text-sm md:text-base">
                            <span class="font-bold">{{ __('Price:') }}</span>
                            {{ number_format($product->price, 2, ',', '.') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between space-x-4">
                        <p class="text-white/80 text-sm md:text-base">
                            <span class="font-bold">{{ __('Average Rate:') }}</span>
                            {{ $product->rating, 2, ',', '.' }}
                        </p>

                        <p class="text-white/80 text-sm md:text-base">
                            <span class="font-bold">{{ __('Sales Qty:') }}</span>
                            {{ $product->sales, 2, ',', '.' }}
                        </p>

                    </div>

                    <!-- Botão para ações -->
                    <button
                        class="lg:absolute lg:bottom-0 lg:right-0 z-50 w-full lg:w-max bg-gradient-to-r from-blue-900 to-blue-500
                         text-white text-base md:text-lg lg:text-xl font-bold px-4 py-3 md:px-6 md:py-4 uppercase transition duration-300 ease-in-out
                          rounded-md shadow-md hover:scale-105 cursor-pointer"
                    >
                        {{ __('Rent this dream!') }}
                    </button>
                </div>
            </div>
        @else
            <p class="text-center text-black/60">Carregando...</p>
        @endif
    </div>
</div>
