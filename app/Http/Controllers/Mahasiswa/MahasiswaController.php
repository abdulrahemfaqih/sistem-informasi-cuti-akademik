<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Models\PengajuanBss;
use Illuminate\Http\Request;
use App\Models\DokumenPendukung;
use App\Http\Controllers\Controller;
use App\Models\HistoriMahasiswa;

class MahasiswaController extends Controller
{
  public function indexBss()
  {
    $pengajuanBss = PengajuanBss::where('mahasiswa_id', auth()->user()->mahasiswa->id)->latest()->get();
    $semesterAktif = Semester::where('status', 'aktif')->first() ?? null;

    return view('mahasiswa.pengajuan_bss', compact('pengajuanBss', 'semesterAktif'));
  }

  public function storeBss(Request $request)
  {
    $rules = [
      'semester_id' => 'required',
      'tahun_ajaran_id' => 'required',
      'alasan' => 'required|min:10|max:255',
    ];

    $messages = [
      'semester_id.required' => 'Semester harus diisi!',
      'tahun_ajaran_id.required' => 'Tahun ajaran harus diisi!',
      'alasan.required' => 'Alasan harus diisi!',
      'alasan.min' => 'Alasan minimal 10 karakter!',
      'alasan.max' => 'Alasan maksimal 255 karakter!',
    ];

    $request->validate($rules, $messages);

    $statusList = ['belum lengkap', 'diajukan', 'disetujui'];

    foreach ($statusList as $status) {
      if (PengajuanBss::where('mahasiswa_id', auth()->user()->mahasiswa->id)
        ->where('tahun_ajaran_id', $request->tahun_ajaran_id)
        ->where('semester_id', $request->semester_id)
        ->where('status', $status)
        ->exists()
      ) {

        return redirect()->route('mahasiswa.bss.index')
          ->with('error', "Maaf, Anda sudah mengajukan cuti sebelumnya dengan status $status.");
      }
    }

    if (HistoriMahasiswa::where('mahasiswa_id', auth()->user()->mahasiswa->id)->count() > 2) {
      return redirect()->route('mahasiswa.bss.index')->with('error', 'Maaf, batas pengajuan cuti hanya 2 kali.');
    }

    $pengajuanBss = PengajuanBss::create([
      'mahasiswa_id' => auth()->user()->mahasiswa->id,
      'semester_id' => $request->semester_id,
      'tahun_ajaran_id' => $request->tahun_ajaran_id,
      'alasan' => $request->alasan,
    ]);

    return redirect()->route('mahasiswa.bss.edit', ['IdPengajuanBss' => $pengajuanBss->id])->with('success', 'Anda memenuhi syarat untuk mengajukan cuti. Silahkan lengkapi data dokumen pendukung untuk pengajuan cuti.');
  }

  public function editBss($IdPengajuanBss)
  {
    $pengajuanBss = PengajuanBss::findOrFail($IdPengajuanBss);

    return view('mahasiswa.edit_pengajuan_bss', compact('pengajuanBss'));
  }

  public function updateBss(Request $request, $IdPengajuanBss)
  {
    $rules = [
      'surat_permohonan_bss' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
      'kartu_mahasiswa' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
      'surat_bebas_tanggungan_fakultas' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
      'surat_bebas_tanggungan_perpustakaan' => 'required|file|mimes:jgp,jpeg,png,pdf|max:2048',
      'surat_bebas_tanggungan_lab' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

    $messages = [
      'surat_permohonan_bss.required' => 'Surat permohonan BSS harus diisi!',
      'surat_permohonan_bss.file' => 'Surat permohonan BSS harus berupa file!',
      'surat_permohonan_bss.mimes' => 'Surat permohonan BSS harus berupa file berformat jpg, jpeg, png, atau pdf!',
      'surat_permohonan_bss.max' => 'Ukuran file surat permohonan BSS maksimal 2MB!',
      'kartu_mahasiswa.required' => 'Kartu mahasiswa harus diisi!',
      'kartu_mahasiswa.file' => 'Kartu mahasiswa harus berupa file!',
      'kartu_mahasiswa.mimes' => 'Kartu mahasiswa harus berupa file berformat jpg, jpeg, png, atau pdf!',
      'kartu_mahasiswa.max' => 'Ukuran file kartu mahasiswa maksimal 2MB!',
      'surat_bebas_tanggungan_fakultas.required' => 'Surat bebas tanggungan fakultas harus diisi!',
      'surat_bebas_tanggungan_fakultas.file' => 'Surat bebas tanggungan fakultas harus berupa file!',
      'surat_bebas_tanggungan_fakultas.mimes' => 'Surat bebas tanggungan fakultas harus berupa file berformat jpg, jpeg, png, atau pdf!',
      'surat_bebas_tanggungan_fakultas.max' => 'Ukuran file surat bebas tanggungan fakultas maksimal 2MB!',
      'surat_bebas_tanggungan_perpustakaan.required' => 'Surat bebas tanggungan perpustakaan harus diisi!',
      'surat_bebas_tanggungan_perpustakaan.file' => 'Surat bebas tanggungan perpustakaan harus berupa file!',
      'surat_bebas_tanggungan_perpustakaan.mimes' => 'Surat bebas tanggungan perpustakaan harus berupa file berformat jpg, jpeg, png, atau pdf!',
      'surat_bebas_tanggungan_perpustakaan.max' => 'Ukuran file surat bebas tanggungan perpustakaan maksimal 2MB!',
      'surat_bebas_tanggungan_lab.file' => 'Surat bebas tanggungan laboratorium harus berupa file!',
      'surat_bebas_tanggungan_lab.mimes' => 'Surat bebas tanggungan laboratorium harus berupa file berformat jpg, jpeg, png, atau pdf!',
      'surat_bebas_tanggungan_lab.max' => 'Ukuran file surat bebas tanggungan laboratorium maksimal 2MB!',
    ];

    $request->validate($rules, $messages);

    $pengajuanBss = PengajuanBss::findOrFail($IdPengajuanBss);
    $nim = auth()->user()->mahasiswa->nim;

    $suratPermohonanBss = $request->file('surat_permohonan_bss');
    $kartuMahasiswa = $request->file('kartu_mahasiswa');
    $suratBebasTanggunganFakultas = $request->file('surat_bebas_tanggungan_fakultas');
    $suratBebasTanggunganPerpustakaan = $request->file('surat_bebas_tanggungan_perpustakaan');

    $suratBebasTanggunganLaboratorium = null;
    if ($request->hasFile('surat_bebas_tanggungan_lab')) {
      $suratBebasTanggunganLaboratorium = $request->file('surat_bebas_tanggungan_lab');
    }

    $jenisDokumen = [
      'kartu_mahasiswa' => $kartuMahasiswa,
      'surat_bebas_tanggungan_fakultas' => $suratBebasTanggunganFakultas,
      'surat_bebas_tanggungan_perpustakaan' => $suratBebasTanggunganPerpustakaan,
      'surat_permohonan_bss' => $suratPermohonanBss,
    ];

    if ($suratBebasTanggunganLaboratorium) {
      $jenisDokumen['surat_bebas_tanggungan_lab'] = $suratBebasTanggunganLaboratorium;
    }

    foreach ($jenisDokumen as $jenis => $path) {
      $fileName = time() . '_' . $nim . '_' . $jenis . '.pdf';
      $pathFile = $path->storeAs($jenis, $fileName, 'public');

      DokumenPendukung::create([
        'pengajuan_bss_id' => $pengajuanBss->id,
        'path_file' => $pathFile,
        'nama_file' => $nim . '_' . $jenis . '.pdf',
        'jenis_dokumen' => $jenis,
      ]);
    }

    $pengajuanBss->update(['status' => 'diajukan']);

    return redirect()->route('mahasiswa.bss.index')->with('success', 'Pengajuan cuti berhasil diajukan! Silahkan tunggu konfirmasi persetujuan dari pihak BAK.');
  }
}
