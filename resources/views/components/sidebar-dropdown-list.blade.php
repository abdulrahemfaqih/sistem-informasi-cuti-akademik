{{-- x-sidebar-dropdown-list component --}}
@props(['id', 'active' => false])

@php
    $classes = $active ? 'py-2 space-y-2' : 'hidden py-2 space-y-2';
@endphp

<ul {{ $attributes->merge(['class' => $classes, 'id' => $id]) }}>
    {{ $slot }}
</ul>
