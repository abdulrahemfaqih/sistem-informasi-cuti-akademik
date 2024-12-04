<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [['label' => 'Data Tahun Ajaran dan Semester']];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        <div class="space-y-6 mt-6">
            @if (session()->has('success'))
                <x-alert-notification :color="'blue'">
                    {{ session('success') }}
                </x-alert-notification>
            @endif
            {{-- Tahun Ajaran Section --}}
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Tahun Ajaran</h3>
                    <button x-data @click="$dispatch('open-modal', { id: 'tambah-tahun-ajaran' })"
                        class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                        Tambah Tahun Ajaran
                    </button>
                </div>
                <div class="p-4">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 text-left">Tahun Ajaran</th>
                                <th class="py-2 text-left">Tanggal Mulai</th>
                                <th class="py-2 text-left">Tanggal Selesai</th>
                                <th class="py-2 text-left">Status</th>
                                <th class="py-2 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahunAjaran as $ta)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2">
                                        <span
                                            class="{{ $ta->status == 'aktif' ? 'bg-green-400' : '' }} px-2 py-1 rounded-lg">{{ $ta->tahun_ajaran }}</span>
                                    </td>
                                    <td class="py-2">{{ $ta->tanggal_mulai }}</td>
                                    <td class="py-2">{{ $ta->tanggal_selesai }}</td>
                                    <td class="py-2">
                                        <span class="{{ $ta->status == 'aktif' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ ucfirst($ta->status) }}
                                        </span>
                                    </td>
                                    <td class="py-2 text-right space-x-2">
                                        <a href="{{ route('admin.bak.edit-tahun-ajaran', $ta->id) }}"
                                            class="text-blue-600 hover:text-blue-800"> Edit</a>
                                        <form action="{{ route('admin.bak.delete-tahun-ajaran', $ta->id) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus tahun ajaran ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                Hapus
                                            </button>
                                        </form>
                                        @if ($ta->status == 'tidak aktif')
                                            <form action="{{ route('admin.bak.set-aktif-tahun-ajaran', $ta->id) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin mengaktifkan tahun ajaran ini?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-600 hover:text-green-800">
                                                    Aktifkan
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Semester Section --}}
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Semester</h3>
                    <button x-data @click="$dispatch('open-modal', { id: 'tambah-semester' })"
                        class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                        Tambah Semester
                    </button>
                </div>
                <div class="p-4">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 text-left">Tahun Ajaran</th>
                                <th class="py-2 text-left">Semester</th>
                                <th class="py-2 text-left">Tanggal Mulai</th>
                                <th class="py-2 text-left">Tanggal Selesai</th>
                                <th class="py-2 text-left">Status</th>
                                <th class="py-2 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semester as $s)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2">{{ $s->tahunAjaran->tahun_ajaran }}</td>
                                    <td class="py-2">
                                        <span
                                            class="{{ $s->status == 'aktif' ? 'bg-green-400' : '' }} px-2 py-1 rounded-lg">
                                            {{ $s->semester }}</span>

                                    </td>
                                    <td class="py-2">{{ $s->tanggal_mulai }}</td>
                                    <td class="py-2">{{ $s->tanggal_selesai }}</td>
                                    <td class="py-2">
                                        <span class="{{ $s->status == 'aktif' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ ucfirst($s->status) }}
                                        </span>
                                    </td>
                                    <td class="py-2 text-right space-x-2">
                                        <a href="{{ route('admin.bak.edit-semester', $s->id) }}"
                                            class="text-blue-600 hover:text-blue-800"> Edit</a>
                                        <form action="{{ route('admin.bak.delete-semester', $s->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus semester ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                Hapus
                                            </button>
                                        </form>
                                        @if ($s->status == 'tidak aktif')
                                            <form action="{{ route('admin.bak.set-aktif-semester', $s->id) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin mengaktifkan semester ini?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-600 hover:text-green-800">
                                                    Aktifkan
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal Tambah Tahun Ajaran --}}
        <div x-data="{ isOpen: false }" x-show="isOpen"
            @open-modal.window="if ($event.detail.id === 'tambah-tahun-ajaran') isOpen = true"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none"
            x-cloak>
            <div class="relative w-auto max-w-3xl mx-auto my-6">
                <div
                    class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                        <h3 class="text-3xl font-semibold">Tambah Tahun Ajaran</h3>
                        <button @click="isOpen = false"
                            class="float-right p-1 ml-auto text-3xl font-semibold leading-none text-black bg-transparent border-0 outline-none opacity-5 focus:outline-none">
                            ×
                        </button>
                    </div>
                    <form action="{{ route('admin.bak.store-tahun-ajaran') }}" method="POST">
                        @csrf
                        <div class="relative flex-auto p-6 space-y-4">
                            <div>
                                <label class="block mb-2">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" required
                                    class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block mb-2">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" required
                                        class="w-full px-3 py-2 border rounded-md">
                                </div>
                                <div>
                                    <label class="block mb-2">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" required
                                        class="w-full px-3 py-2 border rounded-md">
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-end p-6 border-t border-solid rounded-b border-blueGray-200">
                            <button @click="isOpen = false" type="button"
                                class="px-6 py-2 mr-1 mb-1 text-red-500 uppercase transition-all duration-150 ease-linear focus:outline-none">
                                Tutup
                            </button>
                            <button type="submit"
                                class="px-6 py-2 mr-1 mb-1 text-white bg-blue-500 uppercase transition-all duration-150 ease-linear focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>






        {{-- Modal Tambah Semester --}}
        <div x-data="{ isOpen: false }" x-show="isOpen"
            @open-modal.window="if ($event.detail.id === 'tambah-semester') isOpen = true"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none"
            x-cloak>
            <div class="relative w-auto max-w-3xl mx-auto my-6">
                <div
                    class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                        <h3 class="text-3xl font-semibold">Tambah Semester</h3>
                        <button @click="isOpen = false"
                            class="float-right p-1 ml-auto text-3xl font-semibold leading-none text-black bg-transparent border-0 outline-none opacity-5 focus:outline-none">
                            ×
                        </button>
                    </div>
                    <form action="{{ route('admin.bak.store-semester') }}" method="POST">
                        @csrf
                        <div class="relative flex-auto p-6 space-y-4">
                            <div>
                                <label class="block mb-2">Semester</label>
                                <input type="text" name="semester" required
                                    class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div>
                                <label class="block mb-2">Tahun Ajaran</label>
                                <select name="tahun_ajaran_id" required class="w-full px-3 py-2 border rounded-md">
                                    @foreach ($tahunAjaran as $ta)
                                        <option value="{{ $ta->id }}">{{ $ta->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block mb-2">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" required
                                        class="w-full px-3 py-2 border rounded-md">
                                </div>
                                <div>
                                    <label class="block mb-2">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" required
                                        class="w-full px-3 py-2 border rounded-md">
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-end p-6 border-t border-solid rounded-b border-blueGray-200">
                            <button @click="isOpen = false" type="button"
                                class="px-6 py-2 mr-1 mb-1 text-red-500 uppercase transition-all duration-150 ease-linear focus:outline-none">
                                Tutup
                            </button>
                            <button type="submit"
                                class="px-6 py-2 mr-1 mb-1 text-white bg-blue-500 uppercase transition-all duration-150 ease-linear focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </div>
</x-adminbak-layout>
