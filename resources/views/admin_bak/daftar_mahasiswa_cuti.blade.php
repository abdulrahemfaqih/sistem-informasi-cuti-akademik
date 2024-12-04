<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('admin.bak.dashboard')],
                ['label' => 'Daftar Mahasiswa Cuti'],
            ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
        <div class="px-3 mt-6">
            <table id="data-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                NIM
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Nama Mahasiswa
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Tahun Ajaran
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Detail
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($daftarMahasiswaCuti as $mhs)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $mhs->mahasiswa->nim }}
                            </td>
                            <td>{{ $mhs->mahasiswa->user->name}}</td>
                            <td>{{ $mhs->tahunAjaran->tahun_ajaran }} {{ $mhs->semester->semester }}</td>
                            <td>
                                <a href="{{ route('admin.bak.detail-mahasiswa-cuti', $mhs->id) }}"
                                    class="text-blue-500 p-2 ">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">Tidak ada data</p>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-adminbak-layout>
