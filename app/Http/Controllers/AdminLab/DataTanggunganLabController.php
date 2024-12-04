<?php

namespace App\Http\Controllers\AdminLab;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\TanggunganLab;
use App\Http\Controllers\Controller;

class DataTanggunganLabController extends Controller
{
    public function dataTanggungan()
    {
        $tanggungan = TanggunganLab::with('mahasiswa', 'fakultas')->orderBy('status', 'asc')->get();
        return view('admin_lab.data_tanggungan', compact('tanggungan'));
    }

    public function lunaskanData($id)
    {
        $tanggungan = TanggunganLab::find($id);
        $tanggungan->status = 'Lunas';
        $tanggungan->save();
        return redirect()->route('admin.lab.tanggungan')->with('success', 'Data tanggungan lunaskan berhasil');
    }

    public function downloadPdf($id)
    {
        $tanggungan = TanggunganLab::with('mahasiswa', 'fakultas')->findOrFail($id);
        $pdf = Pdf::loadView('admin_lab.surat_tanggungan', compact('tanggungan'));
        return $pdf->download('surat_tanggungan_lab_'.$tanggungan->mahasiswa->user->name.'.pdf');
    }
}
