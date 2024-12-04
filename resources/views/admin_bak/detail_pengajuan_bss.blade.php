<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('admin.bak.dashboard')],
                ['label' => 'Pengajuan BSS','route' => route('admin.bak.pengajuan-bss')],
                ['label' => 'Detail Pengajuan BSS'],
            ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        <div class="px-3 mt-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-xl font-bold mb-4">Informasi Mahasiswa</h2>
                    <div class="space-y-2 border shadow-sm border-gray-500 p-4 rounded-lg">
                        <p><strong>Nama:</strong> {{ $pengajuanBss->mahasiswa->user->name }}</p>
                        <p><strong>NIM:</strong> {{ $pengajuanBss->mahasiswa->nim }}</p>
                        <p><strong>Prodi:</strong> {{ $pengajuanBss->mahasiswa->prodi->nama }}</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-4">Detail Pengajuan</h2>
                    <div class="space-y-2  border shadow-sm border-gray-500 p-4 rounded-lg"">
                        <p><strong>Cuti pada Tahun Ajaran:</strong> {{ $pengajuanBss->tahunAjaran->tahun_ajaran }} {{$pengajuanBss->semester->semester}}</p>
                        <p><strong>Tanggal Pengajuan:</strong> {{ $pengajuanBss->diajukan_pada }}</p>
                        <p><strong>Alasan:</strong> {{ $pengajuanBss->alasan }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-xl font-bold mb-4">Dokumen Pendukung</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($pengajuanBss->dokumenPendukung as $dokumen)
                        <div class="border rounded-lg border-gray-500 p-4 shadow-sm">
                            <p class="font-semibold mb-2">{{ ucwords(str_replace('_', ' ', $dokumen->jenis_dokumen)) }}</p>
                            <a href="{{ asset('storage/' . $dokumen->path_file) }}"
                               target="_blank"
                               class="text-blue-600 hover:underline">
                                Lihat Dokumen
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            @if($pengajuanBss->status == 'diajukan')
            <div class="mt-6 flex space-x-4">
                <form action="{{ route('admin.bak.approve-pengajuan-bss', $pengajuanBss->id) }}" method="POST" class="inline" onclick="return confirm('apakah anda yakin menolak pengajuan ini?')">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 border border-gray-500 rounded hover:bg-green-600">
                        Setujui Pengajuan
                    </button>
                </form>
                <form action="{{ route('admin.bak.reject-pengajuan-bss', $pengajuanBss->id) }}" method="POST" class="inline" onclick="return confirm('apakah anda yakin menolak pengajuan ini?')">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded border border-gray-500 hover:bg-red-600">
                        Tolak Pengajuan
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</x-adminbak-layout>
