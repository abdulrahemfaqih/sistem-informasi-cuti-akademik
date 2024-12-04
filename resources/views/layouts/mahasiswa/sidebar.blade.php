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
          {{-- Overview --}}
          <li>
            <x-sidebar-link href="{{ route('mahasiswa.dashboard') }}" :active="request()->is('mahasiswa/dashboard')">
              <x-sidebar-icon>
                <path
                  d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
              </x-sidebar-icon>
              <span class="ml-3" sidebar-toggle-item>Dashboard</span>
            </x-sidebar-link>
          </li>
          <li>
            <x-sidebar-link href="{{ route('mahasiswa.bss.index') }}" :active="request()->is('mahasiswa/pengajuan-bss')">
              <x-sidebar-icon>

                <path
                  d="M1 12.25C0.585786 12.25 0.25 12.5858 0.25 13C0.25 13.4142 0.585786 13.75 1 13.75H4C4.41421 13.75 4.75 13.4142 4.75 13C4.75 12.5858 4.41421 12.25 4 12.25H1Z" />
                <path
                  d="M1 15.25C0.585786 15.25 0.25 15.5858 0.25 16C0.25 16.4142 0.585786 16.75 1 16.75H7C7.41421 16.75 7.75 16.4142 7.75 16C7.75 15.5858 7.41421 15.25 7 15.25H1Z" />
                <path
                  d="M3.10885 2.09007L3 2C3.3084 1.57553 3.6366 1.26331 4.06107 0.954915C5.3754 0 7.25027 0 11 0H13C16.7497 0 18.6246 0 19.9389 0.954915C20.3634 1.26331 20.6657 1.54132 20.9741 1.96579L20.8485 2.0907L18.5406 4.39861C16.8589 6.08027 15.6499 7.28703 14.6071 8.08267C13.5816 8.8651 12.8055 9.17894 11.9999 9.17894C11.1942 9.17894 10.4181 8.8651 9.39261 8.08267C8.3498 7.28703 7.14079 6.08027 5.45913 4.39861L3.51587 2.45535L3.10885 2.09007Z" />
                <path
                  d="M2 9C2 6.36008 2 4.64946 2.33322 3.40947L2.48385 3.54466L4.43904 5.49984C6.07131 7.13213 7.35049 8.41132 8.48274 9.2752C9.64167 10.1594 10.7344 10.6789 11.9999 10.6789C13.2653 10.6789 14.3581 10.1594 15.517 9.2752C16.6492 8.41132 17.9284 7.13214 19.5607 5.49986L21.6634 3.39709C22 4.63806 22 6.35129 22 9C22 12.7497 22 14.6246 21.0451 15.9389C20.7367 16.3634 20.3634 16.7367 19.9389 17.0451C18.6246 18 16.7497 18 13 18H11C9.57164 18 8.41532 18 7.45841 17.9472C8.34204 17.74 9 16.9468 9 16C9 14.8954 8.10457 14 7 14H5.73244C5.90261 13.7058 6 13.3643 6 13C6 11.8954 5.10457 11 4 11H2.00721C2 10.3989 2 9.73549 2 9Z" />

              </x-sidebar-icon>
              <span class="ml-3" sidebar-toggle-item>Pengajuan BSS</span>
            </x-sidebar-link>
          </li>
        </ul>
      </div>
    </div>
  </div>
</aside>
