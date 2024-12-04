<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('admin.bak.dashboard')],
                ['label' => 'Daftar Mahasiswa Cuti', 'route' => route('admin.bak.daftar-mahasiswa-cuti')],
                ['label' => 'Detail Cuti Mahasiswa'],
            ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        <div class="px-3 mt-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white  rounded-lg overflow-hidden">
                    <div class="px-4 py-3 border-b border-black">
                        <h3 class="text-lg font-semibold text-gray-700">Informasi Mahasiswa</h3>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Nama</span>
                            <span>{{ $dataCutiMahasiswa->mahasiswa->user->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">NIM</span>
                            <span>{{ $dataCutiMahasiswa->mahasiswa->nim }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Program Studi</span>
                            <span>{{ $dataCutiMahasiswa->mahasiswa->prodi->nama }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Email</span>
                            <span>{{ $dataCutiMahasiswa->mahasiswa->user->email }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white  rounded-lg overflow-hidden">
                    <div class="px-4 py-3 border-b border-black">
                        <h3 class="text-lg font-semibold text-gray-700">Informasi Cuti</h3>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Tahun Akademik Cuti</span>
                            <span>{{ $dataCutiMahasiswa->tahunAjaran->tahun_ajaran }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Semester Cuti</span>
                            <span>{{ $dataCutiMahasiswa->semester->semester }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Tahun Akademik Kembali</span>
                            <span>{{ $dataCutiMahasiswa->suratKeteranganCuti->tahunAjaran->tahun_ajaran }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Semester Kembali</span>
                            <span>{{ $dataCutiMahasiswa->suratKeteranganCuti->semester->semester }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Surat Keterangan Cuti --}}
            <div class="bg-white  rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black">
                    <h3 class="text-lg font-semibold text-gray-700">Surat Keterangan Cuti</h3>
                </div>
                <div class="p-4 flex justify-between items-center">
                    @if ($dataCutiMahasiswa->suratKeteranganCuti)
                        <p>{{ $dataCutiMahasiswa->suratKeteranganCuti->nama_file }}</p>
                        <a href="{{ asset('storage/' . $dataCutiMahasiswa->suratKeteranganCuti->path_file) }}"
                            class="text-blue-600 hover:text-blue-800 transition-colors" target="_blank">
                            Lihat Dokumen
                        </a>
                    @else
                        <p class="text-yellow-600">Tidak ada surat keterangan cuti.</p>
                    @endif
                </div>
            </div>

            {{-- Pengajuan BSS --}}
            <div class="bg-white  rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black">
                    <h3 class="text-lg font-semibold text-gray-700">Informasi Pengajuan BSS</h3>
                </div>
                <div class="p-4 space-y-3">
                    @if ($dataCutiMahasiswa->suratKeteranganCuti && $dataCutiMahasiswa->suratKeteranganCuti->pengajuanBss)
                        @php
                            $pengajuanBss = $dataCutiMahasiswa->suratKeteranganCuti->pengajuanBss;
                        @endphp
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Tanggal Pengajuan</span>
                            <span>{{ $pengajuanBss->diajukan_pada }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Status Pengajuan</span>
                            <span
                                class="{{ $pengajuanBss->status == 'disetujui' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($pengajuanBss->status) }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Catatan</span>
                            <span>{{ $pengajuanBss->catatan ?? 'Tidak ada catatan' }}</span>
                        </div>
                    @else
                        <p class="text-yellow-600">Tidak ada informasi pengajuan BSS.</p>
                    @endif
                </div>
            </div>

            {{-- Tombol Kembali --}}
            <div class="flex justify-start">
                <a href="{{ route('admin.bak.daftar-mahasiswa-cuti') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                    Kembali ke Daftar Mahasiswa Cuti
                </a>
            </div>
        </div>
    </div>
</x-adminbak-layout>
