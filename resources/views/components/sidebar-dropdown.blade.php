{{-- x-sidebar-dropdown component --}}
@props(['label', 'id', 'active' => false])

<button type="button"
    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 button-dropdown {{ $active ? 'bg-gray-100 dark:bg-gray-700' : '' }}"
    aria-controls="{{ $id }}"
    data-collapse-toggle="{{ $id }}">
    {{ $slot }}

    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $label }}</span>

    <div class="dropdown-chevron">
        <svg class="w-6 h-6 transform {{ $active ? 'rotate-180' : '' }} transition-transform duration-200"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd">
            </path>
        </svg>
    </div>
</button>
