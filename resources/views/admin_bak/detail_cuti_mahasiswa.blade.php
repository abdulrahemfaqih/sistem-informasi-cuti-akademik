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

        <div class="px-3 mt-6">
            {{-- <h2 class="mb-4 text-xl font-semibold text-gray-700">Detail Cuti Mahasiswa</h2> --}}

            {{-- Informasi Mahasiswa --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="mb-2 font-medium text-gray-600">Informasi Mahasiswa</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p><strong>Nama:</strong> {{ $dataCutiMahasiswa->mahasiswa->nama }}</p>
                        <p><strong>NIM:</strong> {{ $dataCutiMahasiswa->mahasiswa->nim }}</p>
                        <p><strong>Program Studi:</strong> {{ $dataCutiMahasiswa->mahasiswa->prodi->nama }}</p>
                        <p><strong>Email:</strong> {{ $dataCutiMahasiswa->mahasiswa->user->email }}</p>
                    </div>
                </div>

                {{-- Informasi Cuti --}}
                <div>
                    <h3 class="mb-2 font-medium text-gray-600">Informasi Cuti</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p><strong>Tahun Akademik:</strong> {{ $dataCutiMahasiswa->tahunAjaran->nama }}</p>
                        <p><strong>Semester:</strong> {{ $dataCutiMahasiswa->semester->nama }}</p>
                        <p><strong>Status Cuti:</strong>
                            <span
                                class="{{ $dataCutiMahasiswa->status == 'disetujui' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($dataCutiMahasiswa->status) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Detail Surat Keterangan Cuti --}}
            <div class="mb-6">
                <h3 class="mb-2 font-medium text-gray-600">Surat Keterangan Cuti</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    @if ($dataCutiMahasiswa->suratKeteranganCuti)
                        <p><strong>Nomor Surat:</strong> {{ $dataCutiMahasiswa->suratKeteranganCuti->nomor_surat }}</p>
                        <p><strong>Tanggal Surat:</strong>
                            {{ $dataCutiMahasiswa->suratKeteranganCuti->tanggal_surat }}</p>
                        <p><strong>Alasan Cuti:</strong> {{ $dataCutiMahasiswa->suratKeteranganCuti->alasan_cuti }}</p>
                    @else
                        <p class="text-yellow-600">Tidak ada surat keterangan cuti.</p>
                    @endif
                </div>
            </div>

            {{-- Pengajuan BSS --}}
            <div>
                <h3 class="mb-2 font-medium text-gray-600">Informasi Pengajuan BSS</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    @if ($dataCutiMahasiswa->suratKeteranganCuti && $dataCutiMahasiswa->suratKeteranganCuti->pengajuanBss)
                        @php
                            $pengajuanBss = $dataCutiMahasiswa->suratKeteranganCuti->pengajuanBss;
                        @endphp
                        <p><strong>Nomor Pengajuan:</strong> {{ $pengajuanBss->nomor_pengajuan }}</p>
                        <p><strong>Tanggal Pengajuan:</strong> {{ $pengajuanBss->tanggal_pengajuan }}
                        </p>
                        <p><strong>Status Pengajuan:</strong>
                            <span
                                class="{{ $pengajuanBss->status == 'disetujui' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($pengajuanBss->status) }}
                            </span>
                        </p>
                        <p><strong>Catatan:</strong> {{ $pengajuanBss->catatan ?? 'Tidak ada catatan' }}</p>
                    @else
                        <p class="text-yellow-600">Tidak ada informasi pengajuan BSS.</p>
                    @endif
                </div>
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.bak.daftar-mahasiswa-cuti') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                    Kembali ke Daftar Mahasiswa Cuti
                </a>
            </div>
        </div>
    </div>
</x-adminbak-layout>
