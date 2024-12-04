<x-admin-perpus-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [['label' => 'Dashboard']];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    </div>
</x-admin-perpus-layout>