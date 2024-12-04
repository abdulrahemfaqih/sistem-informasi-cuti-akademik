<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [['label' => 'Dashboard']];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />


        <div class="px-3 mt-6">
            
        </div>

    </div>
</x-adminbak-layout>
