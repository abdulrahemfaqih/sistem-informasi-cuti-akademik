<?php

namespace Database\Seeders;

use App\Models\DokumenPendukung;
use App\Models\Mahasiswa;
use App\Models\PengajuanBss;
use App\Models\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanBssDokumenPendukungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nimMahasiswa = ['220411100100', '220411100035'];
        $tahunAjaran = TahunAjaran::where('status', 'aktif')->first();
        $semester = $tahunAjaran->semester()->where('status', 'aktif')->first();

        $jenisDokumen = ['kartu_mahasiswa', 'surat_bebas_tanggungan_fakultas', 'surat_bebas_tanggungan_perpustakaan', 'surat_permohonan_bss', 'surat_bebas_tanggungan_lab'];

        $idMahasiswa = Mahasiswa::where('nim', '220411100100')->first()->id;
        $tahunAjaranNotActive = TahunAjaran::where('status', '!=', 'aktif')->first();
        $semesterNotActive = $tahunAjaranNotActive->semester()->where('status', '!=', 'aktif')->first();

        $pengajuanBss = PengajuanBss::create([
            'mahasiswa_id' => $idMahasiswa,
            'tahun_ajaran_id' => $tahunAjaranNotActive->id,
            'semester_id' => $semesterNotActive->id,
            'alasan' => 'Kendala Keuangan',
            'diajukan_pada' => now(),
            'status' => 'diajukan',
        ]);

        foreach ($jenisDokumen as $jenis) {
            $fileName = '1733192475' . '_' .  '220411100100' . '_' . $jenis . '.pdf';
            $path = $jenis . '/' . $fileName;

            DokumenPendukung::create([
                'pengajuan_bss_id' => $pengajuanBss->id,
                'path_file' => $path,
                'nama_file' => '220411100100' . '_' . $jenis . '.pdf',
                'jenis_dokumen' => $jenis,
            ]);
        }


        foreach ($nimMahasiswa as $nim) {
            $idMahasiswa = Mahasiswa::where('nim', $nim)->first()->id;
            $pengajuanBss = PengajuanBss::create([
                'mahasiswa_id' => $idMahasiswa,
                'tahun_ajaran_id' => $tahunAjaran->id,
                'semester_id' => $semester->id,
                'alasan' => 'Kendala Keuangan',
                'diajukan_pada' => now(),
                'status' => 'diajukan',
            ]);

            foreach ($jenisDokumen as $jenis) {
                $fileName = '1733192472' . '_' .  $nim . '_' . $jenis . '.pdf';
                $path = $jenis . '/' . $fileName;

                DokumenPendukung::create([
                    'pengajuan_bss_id' => $pengajuanBss->id,
                    'path_file' => $path,
                    'nama_file' => $nim . '_' .  $jenis . '.pdf',
                    'jenis_dokumen' => $jenis,
                ]);
            }
        }
    }
}
