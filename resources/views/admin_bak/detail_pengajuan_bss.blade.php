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

        <div class="px-3 mt-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg overflow-hidden">
                    <div class="px-4 py-3 border-b border-black">
                        <h3 class="text-lg font-semibold text-gray-700">Informasi Mahasiswa</h3>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Nama</span>
                            <span>{{ $pengajuanBss->mahasiswa->user->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">NIM</span>
                            <span>{{ $pengajuanBss->mahasiswa->nim }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Program Studi</span>
                            <span>{{ $pengajuanBss->mahasiswa->prodi->nama }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden">
                    <div class="px-4 py-3 border-b border-black">
                        <h3 class="text-lg font-semibold text-gray-700">Detail Pengajuan</h3>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Cuti pada Tahun Ajaran</span>
                            <span>{{ $pengajuanBss->tahunAjaran->tahun_ajaran }} {{ $pengajuanBss->semester->semester }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Tanggal Pengajuan</span>
                            <span>{{ $pengajuanBss->diajukan_pada }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Status</span>
                            <span class="{{ $pengajuanBss->status == 'disetujui' ? 'text-green-600' : ($pengajuanBss->status == 'ditolak' ? 'text-red-600' : 'text-yellow-600') }}">
                                {{ ucfirst($pengajuanBss->status) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Alasan Pengajuan --}}
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black">
                    <h3 class="text-lg font-semibold text-gray-700">Alasan Pengajuan</h3>
                </div>
                <div class="p-4">
                    <p>{{ $pengajuanBss->alasan }}</p>
                </div>
            </div>

            {{-- Dokumen Pendukung --}}
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black">
                    <h3 class="text-lg font-semibold text-gray-700">Dokumen Pendukung</h3>
                </div>
                <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($pengajuanBss->dokumenPendukung as $dokumen)
                        <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                            <span class="text-gray-600 font-medium">
                                {{ ucwords(str_replace('_', ' ', $dokumen->jenis_dokumen)) }}
                            </span>
                            <a href="{{ asset('storage/' . $dokumen->path_file) }}"
                               class="text-blue-600 hover:text-blue-800 transition-colors"
                               target="_blank">
                                Lihat Dokumen
                            </a>
                        </div>
                    @empty
                        <p class="text-yellow-600">Tidak ada dokumen pendukung.</p>
                    @endforelse
                </div>
            </div>

            {{-- Tombol Aksi --}}
            @if($pengajuanBss->status == 'diajukan')
            <div class="flex justify-start space-x-4">
                <form action="{{ route('admin.bak.approve-pengajuan-bss', $pengajuanBss->id) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('Apakah Anda yakin menyetujui pengajuan ini?')">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors">
                        Setujui Pengajuan
                    </button>
                </form>
                <form action="{{ route('admin.bak.reject-pengajuan-bss', $pengajuanBss->id) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('Apakah Anda yakin menolak pengajuan ini?')">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors">
                        Tolak Pengajuan
                    </button>
                </form>
            </div>
            @endif

            {{-- Tombol Kembali --}}
            <div class="flex justify-start">
                <a href="{{ route('admin.bak.pengajuan-bss') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                    Kembali ke Daftar Pengajuan BSS
                </a>
            </div>
        </div>
    </div>
</x-adminbak-layout>
