<x-mahasiswa-layout>
  <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
    @php
      $breadcrumbs = [['label' => 'Dashboard']];
    @endphp
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    <div class="grid grid-cols-2 gap-4 mx-3 my-6">
      <a href="{{ route('mahasiswa.bss.index') }}"
        class="col-span-2 xl:col-span-1 flex items-center gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 h-fit">
        <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M1 12.25C0.585786 12.25 0.25 12.5858 0.25 13C0.25 13.4142 0.585786 13.75 1 13.75H4C4.41421 13.75 4.75 13.4142 4.75 13C4.75 12.5858 4.41421 12.25 4 12.25H1Z" />
          <path
            d="M1 15.25C0.585786 15.25 0.25 15.5858 0.25 16C0.25 16.4142 0.585786 16.75 1 16.75H7C7.41421 16.75 7.75 16.4142 7.75 16C7.75 15.5858 7.41421 15.25 7 15.25H1Z" />
          <path
            d="M3.10885 2.09007L3 2C3.3084 1.57553 3.6366 1.26331 4.06107 0.954915C5.3754 0 7.25027 0 11 0H13C16.7497 0 18.6246 0 19.9389 0.954915C20.3634 1.26331 20.6657 1.54132 20.9741 1.96579L20.8485 2.0907L18.5406 4.39861C16.8589 6.08027 15.6499 7.28703 14.6071 8.08267C13.5816 8.8651 12.8055 9.17894 11.9999 9.17894C11.1942 9.17894 10.4181 8.8651 9.39261 8.08267C8.3498 7.28703 7.14079 6.08027 5.45913 4.39861L3.51587 2.45535L3.10885 2.09007Z" />
          <path
            d="M2 9C2 6.36008 2 4.64946 2.33322 3.40947L2.48385 3.54466L4.43904 5.49984C6.07131 7.13213 7.35049 8.41132 8.48274 9.2752C9.64167 10.1594 10.7344 10.6789 11.9999 10.6789C13.2653 10.6789 14.3581 10.1594 15.517 9.2752C16.6492 8.41132 17.9284 7.13214 19.5607 5.49986L21.6634 3.39709C22 4.63806 22 6.35129 22 9C22 12.7497 22 14.6246 21.0451 15.9389C20.7367 16.3634 20.3634 16.7367 19.9389 17.0451C18.6246 18 16.7497 18 13 18H11C9.57164 18 8.41532 18 7.45841 17.9472C8.34204 17.74 9 16.9468 9 16C9 14.8954 8.10457 14 7 14H5.73244C5.90261 13.7058 6 13.3643 6 13C6 11.8954 5.10457 11 4 11H2.00721C2 10.3989 2 9.73549 2 9Z" />
        </svg>
        <div>
          <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Pengajuan BSS
          </h5>
          <p class="text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-400">
            Ajukan Berhenti Studi Sementara (BSS)
          </p>
        </div>
      </a>

      <div
        class="col-span-2 xl:col-span-1 flex p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Syarat Pengajuan BSS/Cuti</span>
          <ul class="mt-1.5 list-disc list-inside">
            <li>Status akademik mahasiswa aktif;</li>
            <li>Batas kuota BSS/Cuti setiap mahasiswa adalah 2 (dua) kali;</li>
            <li>Masa pengajuan BSS/Cuti adalah pada masa KRS.</li>
          </ul>
        </div>
      </div>

      <div class="col-span-2 flex p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Tata Cara Pengajuan BSS/Cuti</span>
          <ul class="mt-1.5 list-disc list-inside">
            <li>Mahasiswa memilih menu Pengajuan Berhenti Studi Sementara (BSS);</li>
            <li>Mahasiswa mengklik tombol Ajukan BSS dan memeriksa kembali data dirinya, rentang cuti (tahun ajaran),
              dan konfirmasi apakah ingin melakukan pengajuan BSS;
            <li>Setelah mahasiswa mengkonfirmasi dan menekan tombol "Lanjutkan", pengajuan BSS diproses lebih lanjut
            </li>
            <li>Jika mahasiswa memenuhi kriteria, sistem akan meminta mahasiswa unduh Surat Permohonan Berhenti Studi
              Sementara (BSS) untuk diisi kemudian diunggah kembali;</li>
            <li>Kemudian, mahasiswa diharuskan untuk mengunggah dokumen pendukung yang
              dibutuhkan, seperti Surat Permohonan BSS, Kartu Mahasiswa, Surat Bebas Tanggungan Fakultas, Surat Bebas
              Perpustakaan, serta Surat Bebas Tanggungan Laboratorium (jika ada);</li>
            <li>Sistem akan memverifikasi apakah dokumen yang diunggah sudah lengkap dan valid sebelum melanjutkan ke
              tahap berikutnya;</li>
            <li>Setelah semua dokumen diunggah, sistem otomatis mengirimkan notifikasi kepada Biro Akademik dan
              Kemahasiswaan (BAK);</li>
            <li>Pihak BAK akan melakukan verifikasi dokumen secara online, memeriksa kelengkapan dan keabsahan dokumen
              yang diunggah oleh mahasiswa;</li>
            <li>Jika semua dokumen valid dan lengkap, BAK memberikan persetujuan melalui sistem;</li>
            <li>Setelah persetujuan diberikan, mahasiswa akan mendapatkan notifikasi bahwa pengajuan BSS telah disetujui
              atau ditolak;</li>
            <li>Jika pengajuan BSS disetujui, mahasiswa dapat mengunduh Surat Ijin Berhenti Studi Sementara (BSS) yang
              telah
              ditandatangani oleh pihak berwenang;</li>
            <li>Jika pengajuan BSS ditolak, mahasiswa akan mendapatkan pemberitahuan alasan penolakan pengajuan BSS dan
              dapat
              mengajukan kembali pengajuan BSS.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-mahasiswa-layout>
