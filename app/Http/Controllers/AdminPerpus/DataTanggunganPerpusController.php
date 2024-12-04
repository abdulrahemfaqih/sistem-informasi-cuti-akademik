<?php

namespace App\Http\Controllers\AdminPerpus;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\TanggunganPerpustakaan;
use App\Http\Controllers\Controller;

class DataTanggunganPerpusController extends Controller
{
    public function dataTanggungan()
    {
        $tanggungan = TanggunganPerpustakaan::with('mahasiswa', 'fakultas')->orderBy('status', 'asc')->get();
        return view('admin_perpus.data_tanggungan', compact('tanggungan'));
    }

    public function lunaskanData($id)
    {
        $tanggungan = TanggunganPerpustakaan::find($id);
        $tanggungan->status = 'Lunas';
        $tanggungan->save();
        return redirect()->route('admin.perpus.tanggungan')->with('success', 'Data tanggungan lunaskan berhasil');
    }

    public function downloadPdf($id)
    {
        $tanggungan = TanggunganPerpustakaan::with('mahasiswa', 'fakultas')->findOrFail($id);
        $pdf = Pdf::loadView('admin_perpus.surat_tanggungan', compact('tanggungan'));
        return $pdf->download('surat_tanggungan_perpus_'.$tanggungan->mahasiswa->user->name.'.pdf');
    }
}
