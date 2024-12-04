<?php

namespace App\Http\Controllers;

use App\Mail\PengajuanBssNotification;
use App\Models\Semester;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use App\Models\PengajuanBss;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HistoriMahasiswa;
use App\Models\SuratKeteranganCuti;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BakController extends Controller
{
    public function dashboard()
    {

        return view('admin_bak.dashboard', []);
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


    public function processPengajuanBss(Request $request, $id)
    {
        $pengajuanBss = PengajuanBss::findOrFail($id);
        $catatan = $request->input('catatan', '');

        if ($request->input('action') == 'approve') {
            // Existing approval logic
            $nimMahasiswa = $pengajuanBss->mahasiswa->nim;
            $pengajuanBss->update([
                'status' => 'disetujui',
                'disetujui_pada' => now(),
                'catatan' => $catatan
            ]);

            // Rest of your existing approval logic (PDF generation, email, etc.)
            $noSurat = '1234';
            $dataCuti = PengajuanBss::with([
                'mahasiswa',
                'mahasiswa.user',
                'tahunAjaran',
                'semester',
                'dokumenPendukung',
                'mahasiswa.prodi',
                'mahasiswa.prodi.fakultas',
            ])->find($id);

            // menentukan tahun akademik dan semester
            $tahunAkademikKembali = $dataCuti->tahunAjaran;
            $semesterKembali = $dataCuti->semester;

            if ($semesterKembali->semester == "Ganjil") {
                $semesterKembali = Semester::where('semester', 'Genap')->where('tahun_ajaran_id', $dataCuti->tahun_ajaran_id)->first();
            } elseif ($semesterKembali->semester == "Genap") {
                $tahunAkademikKembali = TahunAjaran::where('created_at', '>', $dataCuti->tahunAjaran->created_at)->first();
                $semesterKembali = Semester::where('semester', 'ganjil')->where('tahun_ajaran_id', $tahunAkademikKembali->id)->first();
            }

            $pdf = Pdf::loadView('admin_bak.surat_keterangan_cuti', [
                'namaMahasiswa' => $dataCuti->mahasiswa->user->name,
                'nimMahasiswa' => $dataCuti->mahasiswa->nim,
                'fakultas' => $dataCuti->mahasiswa->prodi->fakultas->nama,
                'prodi' => $dataCuti->mahasiswa->prodi->nama,
                'tahunAkademik' => $dataCuti->tahunAjaran->tahun_ajaran,
                'semester' => $dataCuti->semester->semester,
                'kelas' => "Reguler",
                'noSurat' => $noSurat,
                'tanggalTerbit' => now(),
                'tahunAkademikKembali' => $tahunAkademikKembali->tahun_ajaran,
                'semesterKembali' => $semesterKembali->semester,
            ]);

            $pathFile = 'surat_bss/' . time() . '_surat_keterangan_cuti_' . $nimMahasiswa . '.pdf';
            $namaFile = $nimMahasiswa .  '_surat_keterangan_cuti.pdf';
            Storage::disk('public')->put($pathFile, $pdf->output());

            SuratKeteranganCuti::create([
                'mahasiswa_id' => $pengajuanBss->mahasiswa_id,
                'pengajuan_bss_id' => $pengajuanBss->id,
                'nomor_surat' => $noSurat,
                'nama_file' => $namaFile,
                'path_file' => $pathFile,
                'tahun_ajaran_masuk_id' => $tahunAkademikKembali->id,
                'semester_masuk_id' => $semesterKembali->id,
                'tanggal_terbit' => now()
            ]);

            HistoriMahasiswa::create([
                'mahasiswa_id' => $pengajuanBss->mahasiswa_id,
                'tahun_ajaran_id' => $pengajuanBss->tahun_ajaran_id,
                'semester_id' => $pengajuanBss->semester_id,
                'surat_keterangan_cuti_id' => $pengajuanBss->suratKeteranganCuti->id,
                'status' => 'cuti',
            ]);

            Mail::to($pengajuanBss->mahasiswa->user->email)
                ->queue(new PengajuanBssNotification('disetujui', $pengajuanBss));

            $message = 'Pengajuan BSS berhasil disetujui';
        } else {
            $pengajuanBss->update([
                'status' => 'ditolak',
                'ditolak_pada' => now(),
                'catatan' => $catatan
            ]);

            Mail::to($pengajuanBss->mahasiswa->user->email)
                ->queue(new PengajuanBssNotification('ditolak', $pengajuanBss));

            $message = 'Pengajuan BSS berhasil ditolak';
        }

        return redirect()->route('admin.bak.pengajuan-bss')->with('status', $message);
    }


    // public function approvePengajuanBss($id)
    // {
    //     $pengajuanBss = PengajuanBss::find($id);
    //     $nimMahasiswa = $pengajuanBss->mahasiswa->nim;
    //     $pengajuanBss->update([
    //         'status' => 'disetujui',
    //         'disetujui_pada' => now()
    //     ]);
    //     $noSurat = '1234';
    //     $dataCuti = PengajuanBss::with(
    //         [
    //             'mahasiswa',
    //             'mahasiswa.user',
    //             'tahunAjaran',
    //             'semester',
    //             'dokumenPendukung',
    //             'mahasiswa.prodi',
    //             'mahasiswa.prodi.fakultas',
    //         ]
    //     )->find($id);

    //     // menentukan tahun akademik dan semester
    //     $tahunAkademikKembali = $dataCuti->tahunAjaran;
    //     $semesterKembali = $dataCuti->semester;

    //     if ($semesterKembali->semester == "Ganjil") {
    //         $semesterKembali = Semester::where('semester', 'Genap')->where('tahun_ajaran_id', $dataCuti->tahun_ajaran_id)->first();
    //     } elseif ($semesterKembali->semester == "Genap") {
    //         $tahunAkademikKembali = TahunAjaran::where('created_at', '>', $dataCuti->tahunAjaran->created_at)->first();
    //         $semesterKembali = Semester::where('semester', 'ganjil')->where('tahun_ajaran_id', $tahunAkademikKembali->id)->first();
    //     }
    //     // dd($semesterKembali);

    //     $pdf = Pdf::loadView('admin_bak.surat_keterangan_cuti', [
    //         'namaMahasiswa' => $dataCuti->mahasiswa->user->name,
    //         'nimMahasiswa' => $dataCuti->mahasiswa->nim,
    //         'fakultas' => $dataCuti->mahasiswa->prodi->fakultas->nama,
    //         'prodi' => $dataCuti->mahasiswa->prodi->nama,
    //         'tahunAkademik' => $dataCuti->tahunAjaran->tahun_ajaran,
    //         'semester' => $dataCuti->semester->semester,
    //         'kelas' => "Reguler",
    //         'noSurat' => $noSurat,
    //         'tanggalTerbit' => now(),
    //         'tahunAkademikKembali' => $tahunAkademikKembali->tahun_ajaran,
    //         'semesterKembali' => $semesterKembali->semester,
    //     ]);

    //     $pathFile = 'surat_bss/' . time() . '_surat_keterangan_cuti_' . $nimMahasiswa . '.pdf';
    //     $namaFile = $nimMahasiswa .  '_surat_keterangan_cuti.pdf';
    //     Storage::disk('public')->put($pathFile, $pdf->output());

    //     SuratKeteranganCuti::create([
    //         'mahasiswa_id' => $pengajuanBss->mahasiswa_id,
    //         'pengajuan_bss_id' => $pengajuanBss->id,
    //         'nomor_surat' => $noSurat,
    //         'nama_file' => $namaFile,
    //         'path_file' => $pathFile,
    //         'tahun_ajaran_masuk_id' => $tahunAkademikKembali->id,
    //         'semester_masuk_id' => $semesterKembali->id,
    //         'tanggal_terbit' => now()
    //     ]);

    //     HistoriMahasiswa::create([
    //         'mahasiswa_id' => $pengajuanBss->mahasiswa_id,
    //         'tahun_ajaran_id' => $pengajuanBss->tahun_ajaran_id,
    //         'semester_id' => $pengajuanBss->semester_id,
    //         'surat_keterangan_cuti_id' => $pengajuanBss->suratKeteranganCuti->id,
    //         'status' => 'cuti',
    //     ]);

    //     Mail::to($pengajuanBss->mahasiswa->user->email)
    //         ->queue(new PengajuanBssNotification('disetujui', $pengajuanBss));


    //     return redirect()->route('admin.bak.pengajuan-bss')->with('status', 'Pengajuan BSS berhasil disetujui');
    // }


    // public function rejectPengajuanBss($id)
    // {
    //     $pengajuanBss = PengajuanBss::find($id);
    //     $pengajuanBss->update([
    //         'status' => 'ditolak',
    //         'ditolak_pada' => now()
    //     ]);

    //     Mail::to($pengajuanBss->mahasiswa->user->email)
    //         ->queue(new PengajuanBssNotification('ditolak', $pengajuanBss));

    //     return redirect()->route('admin.bak.pengajuan-bss')->with('status', 'Pengajuan BSS berhasil ditolak');
    // }

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


        return view('admin_bak.daftar_mahasiswa_cuti', [
            'daftarMahasiswaCuti' => $daftarMahasiswaCuti
        ]);
    }


    public function detailCutiMahasiswa($id)
    {
        $dataCutiMahasiswa = HistoriMahasiswa::with(
            [
                'mahasiswa',
                'tahunAjaran',
                'semester',
                'suratKeteranganCuti',
                'mahasiswa.user',
                'suratKeteranganCuti.pengajuanBss',
            ]
        )->find($id);
        // dd($dataCutiMahasiswa);
        return view('admin_bak.detail_cuti_mahasiswa', [
            'dataCutiMahasiswa' => $dataCutiMahasiswa
        ]);
    }
}
