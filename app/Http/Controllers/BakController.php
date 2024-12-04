<?php

namespace App\Http\Controllers;

use App\Models\HistoriMahasiswa;
use App\Models\Mahasiswa;
use App\Models\PengajuanBss;
use App\Models\SuratKeteranganCuti;
use Illuminate\Http\Request;

class BakController extends Controller
{
    public function dashboard()
    {
        return view('admin_bak.dashboard');
    }

    public function pengajuanBss()
    {
        $pengajuanBss = PengajuanBss::with(
            [
                'mahasiswa',
                'tahunAjaran',
                'semester',
                'dokumenPendukung',
                'mahasiswa.user',
                'mahasiswa.prodi',
            ]
        )->where('status', 'diajukan')
            ->get();
        return view('admin_bak.pengajuan_bss', [
            'pengajuanBss' => $pengajuanBss
        ]);
    }

    public function detailPengajuanBss($id)
    {
        $pengajuanBss = PengajuanBss::with(
            [
                'mahasiswa',
                'tahunAjaran',
                'semester',
                'dokumenPendukung',
                'mahasiswa.user',
                'mahasiswa.prodi',
            ]
        )->find($id);
        return view('admin_bak.detail_pengajuan_bss', [
            'pengajuanBss' => $pengajuanBss
        ]);
    }


    public function approvePengajuanBss($id)
    {
        $pengajuanBss = PengajuanBss::find($id);
        $nimMahasiswa = $pengajuanBss->mahasiswa->nim;
        $pengajuanBss->update([
            'status' => 'disetujui',
            'disetujui_pada' => now()
        ]);


        SuratKeteranganCuti::create([
            'mahasiswa_id' => $pengajuanBss->mahasiswa_id,
            'pengajuan_bss_id' => $pengajuanBss->id,
            'nomor_surat' => '1234',
            'nama_file' => 'surat_keterangan_cuti.pdf',
            'path_file' => 'surat_bss/surat_keterangan_cuti.pdf',
            'tanggal_terbit' => now()
        ]);

        HistoriMahasiswa::create([
            'mahasiswa_id' => $pengajuanBss->mahasiswa_id,
            'tahun_ajaran_id' => $pengajuanBss->tahun_ajaran_id,
            'semester_id' => $pengajuanBss->semester_id,
            'surat_keterangan_cuti_id' => $pengajuanBss->suratKeteranganCuti->id,
            'status' => 'cuti',
        ]);


        return redirect()->route('admin.bak.pengajuan-bss');
    }


    public function rejectPengajuanBss($id)
    {
        $pengajuanBss = PengajuanBss::find($id);
        $pengajuanBss->update([
            'status' => 'ditolak',
            'ditolak_pada' => now()
        ]);

        return redirect()->route('admin.bak.pengajuan-bss');
    }



    public function daftarMahasiswaCuti()
    {

        $daftarMahasiswaCuti = HistoriMahasiswa::with(
            [
                'mahasiswa',
                'tahunAjaran',
                'semester',
                'suratKeteranganCuti',
                'mahasiswa.user',
                'suratKeteranganCuti.pengajuanBss',
            ]
        )->where('status', 'cuti')->get();
        // dd($daftarMahasiswaCuti);


        return view('admin_bak.daftar_mahasiswa_cuti', [
            'daftarMahasiswaCuti' => $daftarMahasiswaCuti
        ]);
    }


    public function detailCutiMahasiswa($id) {
        return view('admin_bak.detail_cuti_mahasiswa');
    }
}
