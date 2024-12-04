<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('admin.bak.dashboard')],
                ['label' => 'Pengajuan BSS'],
            ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        <div class="px-3 mt-6">
            @if (session()->has('status'))
                <x-alert-notification :color="'blue'">
                    {{ session('status') }}
                </x-alert-notification>
            @endif
            <table id="data-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                No
                            </span>
                        </th>
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
                                Program Studi
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Tahun Ajaran
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Diajukan Pada
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
                    @forelse ($pengajuanBss as $index => $bss)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $bss->mahasiswa->nim }}
                            </td>
                            <td>
                                {{ $bss->mahasiswa->user->name }}
                            </td>
                            {{-- <td>{{ $bss->mahasiswa->prodi->nama }}</td> --}}
                            <td>{{ $bss->mahasiswa->prodi->nama }}</td>
                            <td>{{ $bss->tahunAjaran->tahun_ajaran }} {{ $bss->semester->semester }}</td>
                            <td>{{ $bss->diajukan_pada }}</td>
                            <td>
                                <a href="{{ route('admin.bak.detail-pengajuan-bss', $bss->id) }}"
                                    class="text-blue-500 p-2 ">Detail</a>
                            </td>
                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>

        </div>


    </div>
</x-adminbak-layout>
