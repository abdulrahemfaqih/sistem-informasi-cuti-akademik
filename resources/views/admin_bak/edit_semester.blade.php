<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [
                ['label' => 'List Tahun Akademik', 'route' => route('admin.bak.data-tahun-ajaran-semester')],
                ['label' => 'Edit Semester'],
            ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
        <div class="px-3 mt-6">
            <form action="{{ route('admin.bak.update-semester', $semester->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div>
                    <label for="semester" class="block mb-2">Semester</label>
                    <input type="text" name="semester" id="semester" value="{{ $semester->semester }}" required
                        class="w-full px-3 py-2 border rounded-md">
                </div>

                <div>
                    <label for="tahun_ajaran_id" class="block mb-2">Tahun Ajaran</label>
                    <select name="tahun_ajaran_id" id="tahun_ajaran_id" required
                        class="w-full px-3 py-2 border rounded-md">
                        @foreach ($tahunAjaran as $ta)
                            <option value="{{ $ta->id }}"
                                {{ $semester->tahun_ajaran_id == $ta->id ? 'selected' : '' }}>
                                {{ $ta->tahun_ajaran }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="tanggal_mulai" class="block mb-2">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                            value="{{ $semester->tanggal_mulai }}" required class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="tanggal_selesai" class="block mb-2">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                            value="{{ $semester->tanggal_selesai }}" required
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
