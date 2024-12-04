<x-mahasiswa-layout>
  <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
    @php
      $breadcrumbs = [
          ['label' => 'Dashboard', 'route' => route('mahasiswa.dashboard')],
          ['label' => 'Pengajuan BSS', 'route' => route('mahasiswa.bss.index')],
          ['label' => 'Edit'],
      ];
    @endphp
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    <div class="flex flex-col gap-4 mx-3 my-6">
      <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Form Dokumen Pendukung Permohonan Berhenti Studi
        Sementara (BSS)
      </h1>
      <form method="POST" action="{{ route('mahasiswa.bss.update', $pengajuanBss->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-4 mb-4 grid-cols-2">
          <div class="col-span-2">
            <div
              class="flex items-center p-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
              role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div class="ms-3 text-sm font-medium">
                Silahkan unduh Surat Permohonan Berhenti Studi Sementara (BSS) <a
                  href="{{ route('mahasiswa.bss.cetak', $pengajuanBss->id) }}"
                  class="font-semibold underline hover:no-underline" target="_blank">disini</a>, kemudian unggah kembali
                setelah semua data terisi.
              </div>
            </div>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</div>
            <div
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              {{ auth()->user()->mahasiswa->nim }}
            </div>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</div>
            <div
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              {{ auth()->user()->mahasiswa->user->name }}
            </div>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas</div>
            <div
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              {{ auth()->user()->mahasiswa->prodi->fakultas->nama }}
            </div>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program Studi</div>
            <div
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              {{ auth()->user()->mahasiswa->prodi->nama }}
            </div>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
            <div
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              {{ $pengajuanBss->semester->semester }}
            </div>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <label for="tahunAjaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
              Ajaran</label>
            <div
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              {{ $pengajuanBss->tahunAjaran->tahun_ajaran }}
            </div>
          </div>
          <div class="col-span-2">
            <label for="surat_permohonan_bss" class="block text-sm font-medium text-gray-900 dark:text-white">Surat
              Permohonan Berhenti Studi Sementara (BSS) <span class="text-red-500">*</span></label>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Format: .jpg, .jpeg, .png, .pdf | Maksimal ukuran
              2MB</p>
            <input type="file" name="surat_permohonan_bss" id="surat_permohonan_bss"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-pointer">
            @error('surat_permohonan_bss')
              <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>
          <div class="col-span-2 sm:col-span-1">
            <label for="kartu_mahasiswa" class="block text-sm font-medium text-gray-900 dark:text-white">Kartu
              Mahasiswa <span class="text-red-500">*</span></label>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Format: .jpg, .jpeg, .png, .pdf | Maksimal ukuran
              2MB</p>
            <input type="file" name="kartu_mahasiswa" id="kartu_mahasiswa"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-pointer">
            @error('kartu_mahasiswa')
              <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>
          <div class="col-span-2 sm:col-span-1">
            <label for="surat_bebas_tanggungan_fakultas"
              class="block text-sm font-medium text-gray-900 dark:text-white">Surat Bebas
              Tanggungan dari Fakultas <span class="text-red-500">*</span></label>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Format: .jpg, .jpeg, .png, .pdf | Maksimal ukuran
              2MB</p>
            <input type="file" name="surat_bebas_tanggungan_fakultas" id="surat_bebas_tanggungan_fakultas"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-pointer">
            @error('surat_bebas_tanggungan_fakultas')
              <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>
          <div class="col-span-2 sm:col-span-1">
            <label for="surat_bebas_tanggungan_perpustakaan"
              class="block text-sm font-medium text-gray-900 dark:text-white">Surat Bebas
              Perpustakaan <span class="text-red-500">*</span></label>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Format: .jpg, .jpeg, .png, .pdf | Maksimal ukuran
              2MB</p>
            <input type="file" name="surat_bebas_tanggungan_perpustakaan" id="surat_bebas_tanggungan_perpustakaan"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-pointer">
            @error('surat_bebas_tanggungan_perpustakaan')
              <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>
          <div class="col-span-2 sm:col-span-1">
            <label for="surat_bebas_tanggungan_lab"
              class="block text-sm font-medium text-gray-900 dark:text-white">Surat Bebas
              Tanggungan Laboratorium</label>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Format: .jpg, .jpeg, .png, .pdf | Maksimal ukuran
              2MB</p>
            <input type="file" name="surat_bebas_tanggungan_lab" id="surat_bebas_tanggungan_lab"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-pointer">
            @error('surat_bebas_tanggungan_lab')
              <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>

          <p class="text-sm text-gray-600 dark:text-gray-400">
            <span class="text-red-500 font-semibold">*</span> Wajib diisi
          </p>
        </div>

        <div class="flex items-center gap-2">
          <button type="submit"
            class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            <svg class="me-1 -ms-1 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Simpan
          </button>
          <a href="{{ route('mahasiswa.bss.index') }}"
            class="px-5 py-2.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200">
            Kembali
          </a>
        </div>
      </form>
    </div>
  </div>
</x-mahasiswa-layout>
