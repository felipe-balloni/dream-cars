<div x-data="{ filter: false, category: false, sortMenu: false, categoryMenu: false }" class="bg-white">
    <div class="mx-auto max-w-7xl px-4 py-8 md:py-16 sm:px-6 lg:px-8">
        <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-gray-900">Escolha o seu próximo veículo</h1>
        <p class="mt-4 max-w-xl text-sm md:text-base text-gray-700">
            <span class="strong font-semibold">Veículos zero km e tecnologia de ponta!</span><br/>
            Alugue com contrato mensal e desfrute da liberdade sem compromisso. Planos flexíveis, zero burocracia e
            economia garantida. Reserve agora!
        </p>
    </div>

    <!--Mobile filter dialog    -->
    <div class="relative z-40 sm:hidden" role="dialog" aria-modal="true">

        <div
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
            x-show="filter"
            @click.self="filter = false"
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
                <form class="mt-4">
                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                            <button
                                @click="category = !category"
                                type="button"
                                class="flex w-full items-center justify-between bg-white px-2 py-3 text-sm text-gray-400"
                                aria-controls="filter-section-0"
                                aria-expanded="false"
                            >
                                <span class="font-medium text-gray-900">{{ __('Category') }}</span>
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
                            <div class="space-y-6">
                                <div class="flex gap-3">
                                    <div class="flex h-5 shrink-0 items-center">
                                        <div class="group grid size-4 grid-cols-1">
                                            <input id="filter-mobile-category-0" name="category[]" value="new-arrivals"
                                                   type="checkbox"
                                                   class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                            <svg
                                                class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                viewBox="0 0 14 14" fill="none">
                                                <path class="opacity-0 group-has-checked:opacity-100"
                                                      d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <label for="filter-mobile-category-0" class="text-sm text-gray-500">All New
                                        Arrivals</label>
                                </div>
                                <div class="flex gap-3">
                                    <div class="flex h-5 shrink-0 items-center">
                                        <div class="group grid size-4 grid-cols-1">
                                            <input id="filter-mobile-category-1" name="category[]" value="tees"
                                                   type="checkbox"
                                                   class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                            <svg
                                                class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                viewBox="0 0 14 14" fill="none">
                                                <path class="opacity-0 group-has-checked:opacity-100"
                                                      d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <label for="filter-mobile-category-1" class="text-sm text-gray-500">Tees</label>
                                </div>
                                <div class="flex gap-3">
                                    <div class="flex h-5 shrink-0 items-center">
                                        <div class="group grid size-4 grid-cols-1">
                                            <input id="filter-mobile-category-2" name="category[]" value="objects"
                                                   type="checkbox" checked
                                                   class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                            <svg
                                                class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                viewBox="0 0 14 14" fill="none">
                                                <path class="opacity-0 group-has-checked:opacity-100"
                                                      d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <label for="filter-mobile-category-2" class="text-sm text-gray-500">Objects</label>
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
                                class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                id="menu-button"
                                aria-expanded="false"
                                aria-haspopup="true"
                        >
                            {{ __('Sort') }}
                            <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500 transform transition-transform duration-150"
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
                            <!--
                              Active: "bg-gray-100 outline-hidden", Not Active: ""

                              Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                            -->
                            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem"
                               tabindex="-1" id="menu-item-0">Most Popular</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                               id="menu-item-1">Best Rating</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                               id="menu-item-2">Newest</a>
                        </div>
                    </div>
                </div>

                <button
                    @click="filter = true"
                    type="button"
                    class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden"
                >
                    {{ __('Filters') }}
                </button>

                <div class="hidden sm:block">
                    <div class="flow-root">
                        <div class="-mx-4 flex items-center divide-x divide-gray-200">
                            <div class="relative inline-block px-4 text-left">
                                <button @click="categoryMenu = !categoryMenu"
                                    type="button"
                                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                        aria-expanded="false"
                                >
                                    <span>Category</span>
                                    <span
                                        class="ml-1.5 rounded-sm bg-gray-200 px-1.5 py-0.5 text-xs font-semibold text-gray-700 tabular-nums">1</span>
                                    <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
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
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-category-0" name="category[]" value="new-arrivals"
                                                           type="checkbox"
                                                           class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg
                                                        class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-checked:opacity-100"
                                                              d="M3 8L6 11L11 3.5" stroke-width="2"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path class="opacity-0 group-has-indeterminate:opacity-100"
                                                              d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-0"
                                                   class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">All
                                                New Arrivals</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-category-1" name="category[]" value="tees"
                                                           type="checkbox"
                                                           class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg
                                                        class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-checked:opacity-100"
                                                              d="M3 8L6 11L11 3.5" stroke-width="2"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path class="opacity-0 group-has-indeterminate:opacity-100"
                                                              d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-1"
                                                   class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">Tees</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-category-2" name="category[]" value="objects"
                                                           type="checkbox" checked
                                                           class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg
                                                        class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-checked:opacity-100"
                                                              d="M3 8L6 11L11 3.5" stroke-width="2"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path class="opacity-0 group-has-indeterminate:opacity-100"
                                                              d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-2"
                                                   class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">Objects</label>
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
            <div class="mx-auto max-w-7xl px-4 py-3 sm:flex sm:items-center sm:px-6 lg:px-8">
                <h3 class="text-sm font-medium text-gray-500">
                    {{ __('Filters') }}
                    <span class="sr-only">, active</span>
                </h3>

                <div aria-hidden="true" class="hidden h-5 w-px bg-gray-300 sm:ml-4 sm:block"></div>

                <div class="mt-2 sm:mt-0 sm:ml-4">
                    <div class="-m-1 flex flex-wrap items-center">
                        <span
                            class="m-1 inline-flex items-center rounded-full border border-gray-200 bg-white py-1.5 pr-2 pl-3 text-sm font-medium text-gray-900">
                          <span>Objects</span>
                          <button type="button"
                                  class="ml-1 inline-flex size-4 shrink-0 rounded-full p-1 text-gray-400 hover:bg-gray-200 hover:text-gray-500">
                            <span class="sr-only">Remove filter for Objects</span>
                            <svg class="size-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                              <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"/>
                            </svg>
                          </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
