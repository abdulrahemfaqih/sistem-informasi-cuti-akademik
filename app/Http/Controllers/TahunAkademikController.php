<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAkademikController extends Controller
{
    public function dataTahunAjaranSemester()
    {
        $tahunAjaran = TahunAjaran::all();
        $semester = Semester::all();
        return view('admin_bak.list_tahunajaran_semester', [
            'tahunAjaran' => $tahunAjaran,
            'semester' => $semester
        ]);
    }

    public function storeTahunAjaran(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        TahunAjaran::create($request->all());
        return redirect()->route('admin.bak.dashboard')->with('status', 'Tahun Ajaran berhasil ditambahkan');
    }

    public function storeSemester(Request $request)
    {
        $request->validate([
            'tahun_ajaran_id' => 'required',
            'semester' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        Semester::create($request->all());
        return redirect()->route('admin.bak.dashboard')->with('status', 'Semester berhasil ditambahkan');
    }

    public function deleteTahunAjaran($id)
    {
        $tahunAjaran = TahunAjaran::find($id);
        $tahunAjaran->delete();
        return redirect()->route('admin.bak.dashboard')->with('status', 'Tahun Ajaran berhasil dihapus');
    }

    public function deleteSemester($id)
    {
        $semester = Semester::find($id);
        $semester->delete();
        return redirect()->route('admin.bak.dashboard')->with('status', 'Semester berhasil dihapus');
    }

    public function setAktifSemester($id)
    {
        // Menonaktifkan semua semester yang aktif terlebih dahulu
        Semester::where('status', 'aktif')->update(['status' => 'tidak aktif']);

        // Mengaktifkan semester yang dipilih
        $semester = Semester::findOrFail($id);
        $semester->status = 'aktif';
        $semester->save();

        return redirect()->back()->with('success', 'Semester berhasil diaktifkan.');
    }

    public function setAktifTahunAjaran($id)
    {
        // Menonaktifkan semua tahun ajaran yang aktif terlebih dahulu
        TahunAjaran::where('status', 'aktif')->update(['status' => 'tidak aktif']);

        // Mengaktifkan tahun ajaran yang dipilih
        $tahunAjaran = TahunAjaran::findOrFail($id);
        $tahunAjaran->status = 'aktif';
        $tahunAjaran->save();

        return redirect()->back()->with('success', 'Tahun ajaran berhasil diaktifkan.');
    }

    public function updateTahunAjaran(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        $tahunAjaran = TahunAjaran::findOrFail($id);
        $tahunAjaran->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('admin.bak.data-tahun-ajaran-semester')->with('success', 'Tahun Ajaran berhasil diperbarui');
    }

    public function updateSemester(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|string',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        $semester = Semester::findOrFail($id);
        $semester->update([
            'semester' => $request->semester,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('admin.bak.data-tahun-ajaran-semester')->with('success', 'Semester berhasil diperbarui');
    }


    public function editSemester($id)
    {
        $semester = Semester::findOrFail($id);
        $tahunAjaran = TahunAjaran::all();
        return view('admin_bak.edit_semester', [
            'semester' => $semester,
            'tahunAjaran' => $tahunAjaran
        ]);
    }

    public function editTahunAjaran($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        return view('admin_bak.edit_tahun_ajaran', [
            'tahunAjaran' => $tahunAjaran
        ]);
    }

}
