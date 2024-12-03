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

            $jenisDokumen = ['kartu_mahasiswa', 'surat_bebas_tanggungan_fakultas', 'surat_bebas_tanggungan_perpustakaan', 'surat_permohonan_bss', 'surat_bebas_tanggungan_lab'];

            foreach ($jenisDokumen as $jenis) {
                $fileName = time() . '_' .  $nim . '_' . $jenis . '.pdf';
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
