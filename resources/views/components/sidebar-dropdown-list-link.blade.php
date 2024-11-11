{{-- x-sidebar-dropdown-list-link component --}}
@props(['active' => false])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 text-base text-gray-900 rounded-lg pl-11 group bg-gray-100 dark:bg-gray-700 dark:text-white'
            : 'flex items-center p-2 text-base text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
