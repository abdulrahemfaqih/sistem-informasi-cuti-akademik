<x-mahasiswa-layout>
  <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
    @php
      $breadcrumbs = [['label' => 'Dashboard', 'route' => route('mahasiswa.dashboard')], ['label' => 'Pengajuan BSS']];
    @endphp
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    <div class="flex flex-col gap-4 mx-3 my-6">
      <div class="items-center justify-end flex md:divide-x md:divide-gray-100">
        <!-- Modal toggle -->
        <button data-modal-target="ajukanBss-modal" data-modal-toggle="ajukanBss-modal"
          class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          type="button">
          Ajukan BSS
        </button>

        @if ($semesterAktif)
          <!-- Main modal -->
          <div id="ajukanBss-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
              <!-- Modal content -->
              <form method="POST" action="{{ route('mahasiswa.bss.store') }}">
                @csrf
                <input type="hidden" name="semester_id" value="{{ $semesterAktif->id }}">
                <input type="hidden" name="tahun_ajaran_id" value="{{ $semesterAktif->tahunAjaran->id }}">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Ajukan Berhenti Studi Sementara (BSS)
                    </h3>
                    <button type="button"
                      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                      data-modal-hide="ajukanBss-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-4 md:p-5 space-y-4">
                    <div>
                      <div class="shadow shadow-gray-200 mb-4">
                        <dl>
                          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">NIM</dt>
                            <dd class="mt-1 text-sm text-gray-500 font-semibold sm:col-span-2">
                              {{ auth()->user()->mahasiswa->nim }}
                            </dd>
                          </div>
                          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Nama</dt>
                            <dd class="mt-1 text-sm text-gray-500 font-semibold sm:col-span-2">
                              {{ auth()->user()->mahasiswa->user->name }}
                            </dd>
                          </div>
                          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Fakultas</dt>
                            <dd class="mt-1 text-sm text-gray-500 font-semibold sm:col-span-2">
                              {{ auth()->user()->mahasiswa->prodi->fakultas->nama }}
                            </dd>
                          </div>
                          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Program Studi</dt>
                            <dd class="mt-1 text-sm text-gray-500 font-semibold sm:col-span-2">
                              {{ auth()->user()->mahasiswa->prodi->nama }}
                            </dd>
                          </div>
                          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Tahun Ajaran</dt>
                            <dd class="mt-1 text-sm text-gray-500 font-semibold sm:col-span-2">
                              {{ $semesterAktif->tahunAjaran->tahun_ajaran }}
                            </dd>
                          </div>
                          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Program Studi</dt>
                            <dd class="mt-1 text-sm text-gray-500 font-semibold sm:col-span-2">
                              {{ $semesterAktif->semester }}
                            </dd>
                          </div>
                        </dl>
                      </div>
                    </div>
                    <div>
                      <label for="alasan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan
                        Berhenti Studi</label>
                      <textarea id="alasan" name="alasan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan alasan berhenti studi sementara" minlength="10" maxlength="255" required></textarea>
                      @error('alasan')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                      @enderror
                    </div>
                    <div
                      class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                      role="alert">
                      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                      </svg>
                      <span class="sr-only">Info</span>
                      <div>
                        <span class="font-medium">Peringatan!</span> Mohon periksa kembali data Anda sebelum yakin untuk
                        melanjutkan pengajuan Beasiswa Siswa (BSS)!
                      </div>
                    </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                      class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      <svg class="me-1 -ms-1 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m7 16 4-4-4-4m6 8 4-4-4-4" />
                      </svg>
                      Lanjutkan
                    </button>
                    <button data-modal-hide="ajukanBss-modal" type="button"
                      class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        @else
          <div id="ajukanBss-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                  class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="ajukanBss-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                  <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Mohon maaf, Anda tidak dapat mengajukan BSS karena periode pengajuan BSS telah berakhir.
                  </h3>
                  <button data-modal-hide="ajukanBss-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Tutup
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>

      <table id="pengajuanBssTable">
        <thead>
          <tr>
            <th>
              <span class="flex items-center">
                Tahun Ajaran
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Semester
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Alasan
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Diajukan Pada
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Disetujui Pada
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Ditolak Pada
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Status
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Aksi
              </span>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pengajuanBss as $bss)
            <tr>
              <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $bss->tahunAjaran->tahun_ajaran }}</td>
              <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $bss->semester->semester }}
              </td>
              <td>{{ $bss->alasan }}</td>
              <td>{{ $bss->diajukan_pada ?? '-' }}</td>
              <td>{{ $bss->disetujui_pada ?? '-' }}</td>
              <td>{{ $bss->ditolak_pada ?? '-' }}</td>
              <td>
                @if ($bss->status === 'belum lengkap')
                  <span
                    class="inline-flex items-center bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-orange-900 dark:text-orange-300">
                    <span class="w-2 h-2 me-1 bg-orange-500 rounded-full"></span>
                    Belum Lengkap
                  </span>
                @elseif ($bss->status === 'diajukan')
                  <span
                    class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                    <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                    Diajukan
                  </span>
                @elseif ($bss->status === 'disetujui')
                  <span
                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                    Disetujui
                  </span>
                @elseif ($bss->status === 'ditolak')
                  <span
                    class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                    Ditolak
                  </span>
                @endif
              </td>
              <td>
                @if ($bss->status === 'belum lengkap')
                  <a href="{{ route('mahasiswa.bss.edit', $bss->id) }}"
                    class="inline-flex gap-1 flex-wrap justify-center items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-200 dark:bg-orange-500 dark:hover:bg-orange-600 dark:focus:ring-orange-700">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                      <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd"></path>
                    </svg>
                    Lengkapi Dokumen
                  </a>
                @elseif ($bss->status === 'ditolak')
                  <button type="button" data-modal-target="alasan-modal-{{ $bss->id }}"
                    data-modal-toggle="alasan-modal-{{ $bss->id }}"
                    class="inline-flex gap-1 flex-wrap justify-center items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-width="2"
                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                      <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Lihat Alasan
                  </button>

                  <div id="alasan-modal-{{ $bss->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                          class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                          data-modal-hide="alasan-modal-{{ $bss->id }}">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                          </svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            Mohon maaf, pengajuan BSS Anda belum lengkap. Silakan ulangi pengajuan BSS Anda.
                          </h3>
                          <button data-modal-hide="alasan-modal-{{ $bss->id }}" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Tutup
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                @else
                  <a href="{{ route('mahasiswa.bss.show', $bss) }}"
                    class="inline-flex gap-1 flex-wrap justify-center items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-width="2"
                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                      <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Lihat Detail
                  </a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script>
    if (document.getElementById("pengajuanBssTable") && typeof simpleDatatables.DataTable !== 'undefined') {
      const dataTable = new simpleDatatables.DataTable("#pengajuanBssTable", {
        searchable: true,
        sortable: false
      });
    }
  </script>
</x-mahasiswa-layout>
