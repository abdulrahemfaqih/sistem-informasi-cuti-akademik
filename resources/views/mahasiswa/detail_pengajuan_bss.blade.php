<x-mahasiswa-layout>
  <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
    @php
      $breadcrumbs = [
          ['label' => 'Dashboard', 'route' => route('mahasiswa.dashboard')],
          ['label' => 'Pengajuan BSS', 'route' => route('mahasiswa.bss.index')],
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
              <span>{{ $pengajuanBss->tahunAjaran->tahun_ajaran }}
                {{ $pengajuanBss->semester->semester }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600 font-medium">Tanggal Pengajuan</span>
              <span>{{ $pengajuanBss->diajukan_pada }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600 font-medium">Status</span>
              @if ($pengajuanBss->status === 'belum lengkap')
                <span
                  class="inline-flex items-center bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-orange-900 dark:text-orange-300">
                  <span class="w-2 h-2 me-1 bg-orange-500 rounded-full"></span>
                  Belum Lengkap
                </span>
              @elseif ($pengajuanBss->status === 'diajukan')
                <span
                  class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                  <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                  Diajukan
                </span>
              @elseif ($pengajuanBss->status === 'disetujui')
                <span
                  class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                  <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                  Disetujui
                </span>
              @elseif ($pengajuanBss->status === 'ditolak')
                <span
                  class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                  <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                  Ditolak
                </span>
              @endif
            </div>
          </div>
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
                class="text-blue-600 hover:text-blue-800 transition-colors" target="_blank">
                Lihat Dokumen
              </a>
            </div>
          @empty
            <p class="text-yellow-600">Tidak ada dokumen pendukung.</p>
          @endforelse
        </div>
      </div>

      {{-- Tombol Kembali --}}
      <div class="flex justify-start">
        <a href="{{ route('mahasiswa.bss.index') }}"
          class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
          Kembali ke Daftar Pengajuan BSS
        </a>
      </div>
    </div>
  </div>
</x-mahasiswa-layout>
