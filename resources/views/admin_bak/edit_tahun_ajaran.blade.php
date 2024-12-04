<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [
                ['label' => 'List Tahun Akademik', 'route' => route('admin.bak.data-tahun-ajaran-semester')],
                ['label' => 'Edit Tahun Ajaran'],
            ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        <div class="px-3 mt-6">
            <form action="{{ route('admin.bak.update-tahun-ajaran', $tahunAjaran->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div>
                    <label for="tahun_ajaran" class="block mb-2">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="{{ $tahunAjaran->tahun_ajaran }}"
                        required class="w-full px-3 py-2 border rounded-md">
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="tanggal_mulai" class="block mb-2">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                            value="{{ $tahunAjaran->tanggal_mulai }}" required
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="tanggal_selesai" class="block mb-2">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                            value="{{ $tahunAjaran->tanggal_selesai }}" required
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 text-white bg-blue-500 rounded-md">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-adminbak-layout>
