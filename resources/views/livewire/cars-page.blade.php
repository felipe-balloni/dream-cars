<div x-data="{
        filter: false,
        category: true,
        brand: true,
        sortMenu: false,
        categoryMenu: false,
        brandMenu: false,

        init() {
            this.$watch('$wire.selectedCategories', () => {
                this.categoryMenu = false;
            });
            this.$watch('$wire.selectedBrands', () => {
                this.brandMenu = false;
            });
            this.$watch('$wire.sort', () => {
                this.sortMenu = false;
            });
        }
    }" class="bg-white">
    <div class="mx-auto max-w-7xl px-4 py-8 md:py-16 sm:px-6 lg:px-8">
        <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-gray-900">{{ __('Choose your next vehicle') }}</h1>
        <p class="mt-4 max-w-xl text-sm md:text-base text-gray-700 leading-relaxed">
            <span
                class="strong font-semibold">{{ __('Zero-kilometer vehicles and cutting-edge technology!') }}</span><br/>
            {{ __('Rent with a monthly contract and enjoy freedom without commitment.
             Flexible plans, zero bureaucracy, and guaranteed savings. Reserve now!') }}
        </p>
    </div>

    <!-- Mobile filter dialog -->
    <div class="relative z-40 sm:hidden" role="dialog" aria-modal="true">

        <div
            wire:ignore
            x-show="filter"
            @keydown.escape.window="filter = false"
            class="fixed inset-0 bg-black/25"
            aria-hidden="true"
            x-cloak
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        ></div>

        <div
            wire:ignore
            x-show="filter"
            @click.self="filter = false"
            @keydown.escape.window="filter = false"
            class="fixed inset-0 z-40 flex"
            x-cloak
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
        >
            <div
                class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                <div class="flex items-center justify-between px-4">
                    <h2 class="text-lg font-medium text-gray-900">{{ __('Filters') }}</h2>
                    <button
                        @click="filter = false"
                        type="button"
                        class="-mr-2 flex size-10 items-center justify-center rounded-md bg-white p-2 text-gray-400"
                        aria-label="Fechar menu"
                    >
                        <span class="sr-only">Fechar menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Filters -->
                <form class="mt-4" @submit.prevent>
                    <div class="px-4 py-6">
                        <input type="search"
                               wire:model.live.debounce.500ms="search"
                               class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                               placeholder="{{ __('Search Cars...') }}">
                    </div>
                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                            <button
                                @click="category = !category"
                                type="button"
                                class="flex w-full items-center justify-between bg-white px-2 py-3 text-sm text-gray-400 cursor-pointer"
                                aria-controls="filter-section-0"
                                aria-expanded="false"
                            >
                                <span class="font-medium text-gray-900">{{ __('Categories') }}</span>
                                <span class="ml-6 flex items-center">
                                    <svg class="size-5 transform transition-transform duration-150"
                                         :class="{ 'rotate-180': category }"
                                         viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true"
                                         data-slot="icon">
                                    <path fill-rule="evenodd"
                                          d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                          clip-rule="evenodd"/>
                                    </svg>
                                </span>
                            </button>
                        </h3>

                        <div
                            x-show="category"
                            class="pt-6"
                            id="filter-section-0"
                            x-cloak
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 transform -translate-y-1"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-1"
                        >
                            <div class="pt-6" id="filter-section-0">
                                <div class="space-y-6">
                                    @foreach($categories as $category)
                                        <x-checkbox-item
                                            :item="$category"
                                            wireModel="selectedCategories"
                                            name="category"
                                        />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                            <button
                                @click="brand = !brand"
                                type="button"
                                class="flex w-full items-center justify-between bg-white px-2 py-3 text-sm text-gray-400 cursor-pointer"
                                aria-controls="filter-section-0"
                                aria-expanded="false"
                            >
                                <span class="font-medium text-gray-900">{{ __('Brand') }}</span>
                                <span class="ml-6 flex items-center">
                                  <svg class="size-5 transform transition-transform duration-150"
                                       :class="{ 'rotate-180': brand }"
                                       viewBox="0 0 20 20" fill="currentColor"
                                       aria-hidden="true"
                                       data-slot="icon">
                                    <path fill-rule="evenodd"
                                          d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                          clip-rule="evenodd"/>
                                  </svg>
                                </span>
                            </button>
                        </h3>

                        <div
                            x-show="brand"
                            class="pt-6"
                            id="filter-section-0"
                            x-cloak
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 transform -translate-y-1"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-1"
                        >
                            <div class="pt-6" id="filter-section-1">
                                <div class="space-y-6">
                                    @foreach($brands as $brand)
                                        <x-checkbox-item
                                            :item="$brand"
                                            wireModel="selectedBrands"
                                            name="brand"
                                        />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Filters -->
    <section aria-labelledby="filter-heading">

        <h2 id="filter-heading" class="sr-only">{{ __('Filters') }}</h2>

        <div class="border-b border-gray-200 bg-white pb-4">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <div class="relative inline-block text-left">
                    <div>
                        <button @click="sortMenu = !sortMenu"
                                type="button"
                                class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900 cursor-pointer"
                                id="menu-button"
                                aria-expanded="false"
                                aria-haspopup="true"
                        >
                            {{ __('Sort By') }}
                            <svg
                                class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500 transform transition-transform duration-150"
                                :class="{ 'rotate-180': sortMenu }"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                      d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>

                    <div
                        x-show="sortMenu"
                        class="absolute left-0 z-10 mt-2 w-40 origin-top-left rounded-md bg-white ring-1 shadow-2xl ring-black/5 focus:outline-hidden"
                        role="menu"
                        aria-orientation="vertical"
                        aria-labelledby="menu-button"
                        tabindex="-1"
                        x-cloak
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                    >
                        <div class="py-1" role="none">
                            <a
                                href="#"
                                wire:click.prevent="$set('sort', 'most_popular')"
                                class="block px-4 py-2 text-sm font-medium "
                                :class="{'font-medium text-gray-900 bg-gray-100 outline-hidden': @js($sort === 'most_popular'),
                                 'text-gray-500': @js($sort !== 'most_popular')}"
                                role="menuitem" tabindex="-1"
                            >
                                {{ __('Most Popular') }}
                            </a>
                            <a
                                href="#"
                                wire:click.prevent="$set('sort', 'best_rating')"
                                class="block px-4 py-2 text-sm "
                                :class="{'font-medium text-gray-900 bg-gray-100 outline-hidden': @js($sort === 'best_rating'),
                                 'text-gray-500': @js($sort !== 'best_rating')}"

                                role="menuitem" tabindex="-1"
                            >
                                {{ __('Best Rating') }}
                            </a>
                            <a
                                href="#"
                                wire:click.prevent="$set('sort', 'newest')"
                                class="block px-4 py-2 text-sm"
                                :class="{'font-medium text-gray-900 bg-gray-100 outline-hidden': @js($sort === 'newest'),
                                 'text-gray-500': @js($sort !== 'newest')}"
                                role="menuitem"
                                tabindex="-1"
                            >
                                {{ __('Newest') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sm:hidden">
                    @if($search || $selectedCategories || $selectedBrands || $sort !== 'most_popular')
                        <button type="button" wire:click="resetFilters"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-2 py-1
                                     rounded mx-4 whitespace-nowrap cursor-pointer">
                            {{ __('Clean filters') }}
                        </button>
                    @endif
                    <button
                        @click="filter = true"
                        type="button"
                        class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 cursor-pointer"
                    >
                        {{ __('Filters') }}
                    </button>
                </div>

                <div class="hidden sm:block">
                    <div class="flow-root">
                        <div class="-mx-4 flex items-center divide-x divide-gray-200">
                            @if($search || $selectedCategories || $selectedBrands || $sort !== 'most_popular')
                                <button type="button" wire:click="resetFilters"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-4 py-2
                                     rounded mx-4 whitespace-nowrap cursor-pointer">
                                    {{ __('Clean filters') }}
                                </button>
                            @endif
                            <input
                                type="search"
                                wire:model.live.debounce.500ms="search"
                                class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                                placeholder="{{ __('Search Cars...') }}"
                            >
                            <div class="relative inline-block px-4 text-left">
                                <button @click="categoryMenu = !categoryMenu"
                                        type="button"
                                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900 cursor-pointer"
                                        aria-expanded="false"
                                >
                                    <span>{{ __('Categories') }}</span>
                                    <span
                                        class="ml-1.5 rounded-sm bg-gray-200 px-1.5 py-0.5 text-xs font-semibold text-gray-700 tabular-nums">{{ collect($selectedCategories)->count() }}</span>
                                    <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                         data-slot="icon">
                                        <path fill-rule="evenodd"
                                              d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                <div
                                    x-show="categoryMenu"
                                    class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 ring-1 shadow-2xl ring-black/5 focus:outline-hidden"
                                    x-cloak
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                >
                                    <form class="space-y-4">
                                        <div class="pt-6" id="filter-section-0">
                                            <div class="space-y-6">
                                                @foreach($categories as $category)
                                                    <x-checkbox-item
                                                        :item="$category"
                                                        wireModel="selectedCategories"
                                                        name="category"
                                                    />
                                                @endforeach
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="relative inline-block px-4 text-left">
                                <button @click="brandMenu = !brandMenu"
                                        type="button"
                                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900 cursor-pointer"
                                        aria-expanded="false"
                                >
                                    <span>{{ __('Brands') }}</span>
                                    <span
                                        class="ml-1.5 rounded-sm bg-gray-200 px-1.5 py-0.5 text-xs font-semibold text-gray-700 tabular-nums">{{ collect($selectedBrands)->count() }}</span>
                                    <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                         data-slot="icon">
                                        <path fill-rule="evenodd"
                                              d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                <div
                                    x-show="brandMenu"
                                    class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 ring-1 shadow-2xl ring-black/5 focus:outline-hidden"
                                    x-cloak
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                >
                                    <form class="space-y-4">
                                        <div class="pt-6" id="filter-section-0">
                                            <div class="space-y-6">
                                                @foreach($brands as $brand)
                                                    <x-checkbox-item
                                                        :item="$brand"
                                                        wireModel="selectedBrands"
                                                        name="brand"
                                                    />
                                                @endforeach
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active filters -->
        <div class="bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 py-3 sm:flex sm:items-center sm:px-6 lg:px-8 min-h-16">
                <h3 class="text-sm font-medium text-gray-500">
                    {{ __('Filters:') }}
                    <span class="sr-only">, active</span>
                </h3>

                <div class="mt-2 sm:mt-0 sm:ml-4">
                    <div class="-m-1 flex flex-wrap items-center">
                        @foreach($selectedFilter as $filter)
                            <x-filter-item :filter="$filter"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section aria-labelledby="products">
        <div class="mx-auto max-w-7xl px-4 py-8 md:py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-6 lg:space-y-8">
            <h2 id="products-heading" class="font-semibold text-2xl">
                {{ __('Available Cars') }}
                <span class="text-gray-400 text-sm font-thin px-2">
                    ( {{  __(Str::of($sort)->headline()->lower()->value()) }} )
                </span>
            </h2>
            <p class="text-sm text-gray-700">{{ __('Chose your next dream car, click to see details!') }}</p>
            <div
                class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 overflow-x-auto items-stretch py-2">
                @forelse ($products as $product)
                    <div class="w-full h-full cursor-pointer select-none"
                         @click="$dispatch('openProductModal', { productId: {{ $product->id }} })"
                    >
                        <x-product-card :product="$product"/>
                    </div>
                @empty
                    <p> {{ __('No results found!') }}</p>
                @endforelse
            </div>
            <div class="mt-4 md:mt-8">
                {{ $products->links(data: ['scrollTo' => false]) }}
            </div>
        </div>
    </section>
    <livewire:car-details/>
</div>
