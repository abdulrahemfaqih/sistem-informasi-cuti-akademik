<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                {{-- Sidebar Header --}}
                <ul class="pb-2 space-y-2">
                    <li>
                        <form action="#" method="GET" class="lg:hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="email" id="mobile-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search">
                            </div>
                        </form>
                    </li>
                    <li>
                        <x-sidebar-link href="{{ route('admin.fakultas.dashboard') }}" :active="request()->is('admin_fakultas/dashboard')">
                            <x-sidebar-icon>
                                <path
                                    d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                                <path
                                    d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                            </x-sidebar-icon>
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </x-sidebar-link>
                    </li>

                    <li>
                        <x-sidebar-link href="{{ route('admin.fakultas.data-tembusan-bss') }}" :active="request()->is('admin_fakultas/tembusanBSS*')">
                            <x-sidebar-icon>
                                <path d="M1 6v12a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H3a2 2 0 0 0-2 2Zm2-1h18a1 1 0 0 1 .992.876L12 11.798 2.008 5.876A1 1 0 0 1 3 5Zm18 14H3a1 1 0 0 1-1-1V7.095l9.91 5.911a1 1 0 0 0 1.018 0L22 7.095V18a1 1 0 0 1-1 1Z" />
                            </x-sidebar-icon>
                            <span class="ml-3" sidebar-toggle-item>Tembusan BSS</span>
                        </x-sidebar-link>
                    </li>

                    <li>
                        <x-sidebar-link href="{{ route('admin.fakultas.tanggungan') }}" :active="request()->is('admin_fakultas/tembusanBSS*')">
                            <x-sidebar-icon>
                                <path d="M1 6v12a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H3a2 2 0 0 0-2 2Zm2-1h18a1 1 0 0 1 .992.876L12 11.798 2.008 5.876A1 1 0 0 1 3 5Zm18 14H3a1 1 0 0 1-1-1V7.095l9.91 5.911a1 1 0 0 0 1.018 0L22 7.095V18a1 1 0 0 1-1 1Z" />
                            </x-sidebar-icon>
                            <span class="ml-3" sidebar-toggle-item>Tanggungan</span>
                        </x-sidebar-link>
                    </li>
                </ul>

                {{-- Sidebar Footer --}}
                {{-- <div class="pt-2 space-y-2">
                    <x-sidebar-link href="#">
                        <x-sidebar-icon>
                            <path
                                d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </x-sidebar-icon>
                        <span class="ml-3" sidebar-toggle-item>Notifikasi</span>
                    </x-sidebar-link>
                </div> --}}
            </div>
        </div>
    </div>
</aside>
