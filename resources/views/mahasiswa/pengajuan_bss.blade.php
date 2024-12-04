<x-mahasiswa-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [['label' => 'Dashboard', 'route' => route('mahasiswa.dashboard')], ['label' => 'Pengajuan BSS']];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        
    </div>

</x-mahasiswa-layout>
