<?php

namespace App\Http\Controllers\AdminFakultas;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\TanggunganFakultas;
use App\Http\Controllers\Controller;

class DataTanggunganController extends Controller
{
    public function dataTanggungan()
    {
        $tanggungan = TanggunganFakultas::with('mahasiswa', 'fakultas')->orderBy('status', 'asc')->get();
        return view('admin_fakultas.data_tanggungan', compact('tanggungan'));
    }

    public function lunaskanData($id)
    {
        $tanggungan = TanggunganFakultas::find($id);
        $tanggungan->status = 'Lunas';
        $tanggungan->save();
        return redirect()->route('admin.fakultas.tanggungan')->with('success', 'Data tanggungan lunaskan berhasil');
    }

    public function downloadPdf($id)
    {
        $tanggungan = TanggunganFakultas::with('mahasiswa', 'fakultas')->findOrFail($id);
        $pdf = Pdf::loadView('admin_fakultas.surat_tanggungan', compact('tanggungan'));
        return $pdf->download('surat_tanggungan_'.$tanggungan->mahasiswa->user->name.'.pdf');
    }
}
