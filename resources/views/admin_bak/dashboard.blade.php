<x-adminbak-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        @php
            $breadcrumbs = [['label' => 'Dashboard']];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        <div class="px-3 mt-6 space-y-6">
            <!-- Grafik Pengajuan BSS -->
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black">
                    <h3 class="text-lg font-semibold text-gray-700">Grafik Pengajuan BSS</h3>
                </div>
                <div class="p-4">
                    <canvas id="pengajuanBssChart"></canvas>
                </div>
            </div>

            <!-- Grafik Cuti Mahasiswa -->
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="px-4 py-3 border-b border-black">
                    <h3 class="text-lg font-semibold text-gray-700">Grafik Cuti Mahasiswa</h3>
                </div>
                <div class="p-4">
                    <canvas id="cutiMahasiswaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const pengajuanStudiData = @json($pengajuanStudi);
        const cutiMahasiswaData = @json($cutiMahasiswa);

        console.log(pengajuanStudiData);


        const tahunAjaranSemester = pengajuanStudiData.map(item =>
            `${item.tahun_ajaran.tahun_ajaran} - ${item.semester.semester}`);
        const pengajuanStudiValues = pengajuanStudiData.map(item => item.jumlah);
        const cutiMahasiswaValues = cutiMahasiswaData.map(item => item.jumlah);


        const ctxPengajuanBss = document.getElementById('pengajuanBssChart').getContext('2d');
        const pengajuanBssChart = new Chart(ctxPengajuanBss, {
            type: 'line',
            data: {
                labels: tahunAjaranSemester,
                datasets: [{
                    label: 'Jumlah Pengajuan BSS',
                    data: pengajuanStudiValues,
                    borderColor: '#34D399',
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun Ajaran & Semester'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Mahasiswa'
                        },
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });


        const ctxCutiMahasiswa = document.getElementById('cutiMahasiswaChart').getContext('2d');
        const cutiMahasiswaChart = new Chart(ctxCutiMahasiswa, {
            type: 'line',
            data: {
                labels: tahunAjaranSemester,
                datasets: [{
                    label: 'Jumlah Cuti Mahasiswa',
                    data: cutiMahasiswaValues,
                    borderColor: '#F87171',
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                //
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun Ajaran & Semester'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Mahasiswa'
                        },
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }

                    }
                }
            }
        });
    </script>
</x-adminbak-layout>
