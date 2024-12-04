<?php

namespace App\Http\Controllers\AdminFakultas;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengajuanBss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class DataTembusanBssController extends Controller
{
    public function dataTembusanBss(Request $request)
    {
        $search = $request->input('search');
        $tembusan = PengajuanBss::with(['mahasiswa.user', 'mahasiswa.prodi.fakultas', 'tahunAjaran', 'semester'])
            ->where('status', 'disetujui')
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->whereHas('mahasiswa.user', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
                }
            })
            ->orderBy('disetujui_pada', 'desc')->paginate(10);

        return view('admin_fakultas.data_tembusan_bss', compact('tembusan'));
    }

    public function downloadPdf($id)
    {
        $pengajuan = PengajuanBss::with(['mahasiswa.user', 'tahunAjaran', 'semester', 'mahasiswa.prodi'])
            ->findOrFail($id);

        $pdf = Pdf::loadView('admin_fakultas.surat_tembusan', compact('pengajuan'));
        return $pdf->download('surat_tembusan_'.$pengajuan->mahasiswa->user->name.'.pdf');
    }
}
