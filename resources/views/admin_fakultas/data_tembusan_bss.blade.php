<x-admin-fakultas-layout>
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1 p-4">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <!-- Breadcrumb navigation remains the same -->
                </nav>

                <h1 class="text-xl pb-5 font-semibold text-gray-900 sm:text-2xl dark:text-white">Daftar Tembusan BSS</h1>

                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('admin.fakultas.data-tembusan-bss') }}" class="mb-4">
                    <div class="flex items-center space-x-2">
                        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Cari ..." class="px-4 py-2 w-1/4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <button type="submit" class="px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm focus:outline-none">
                            Cari
                        </button>
                    </div>
                </form>

                <div class="overflow-x-auto max-w-full">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">No</th>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-1/12">NIM</th>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-1/4">Nama Mahasiswa</th>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Fakultas</th>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tahun Ajaran</th>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Alasan Cuti</th>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal Disetujui</th>
                                <th class="px-4 py-2 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($tembusan as $index => $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $item->mahasiswa->nim }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $item->mahasiswa->user->name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $item->mahasiswa->prodi->fakultas->nama}}, {{ $item->mahasiswa->prodi->nama}}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $item->tahunAjaran->tahun_ajaran }} / {{ $item->semester->semester }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $item->alasan }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm">
                                        <p class="bg-green-200 text-green-800 rounded-lg px-2 py-1 inline-flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-green-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 011.414 1.414L9 14.414 4.879 10.293a1 1 0 011.414-1.414L9 11.586l7.707-7.707z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $item->disetujui_pada }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-1.5 whitespace-nowrap text-sm">
                                        <form action="{{ route('admin.fakultas.download-bss', $item->id) }}" method="GET" class="inline-block">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center px-4 py-1.5 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 pr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                                Cetak
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $tembusan->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-fakultas-layout>
