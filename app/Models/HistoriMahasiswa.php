<?php

namespace App\Models;

use App\Models\Semester;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoriMahasiswa extends Model
{
    use HasFactory, HasUlids;


    protected $table = 'histori_mahasiswa';
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function suratKeteranganCuti()
    {
        return $this->belongsTo(SuratKeteranganCuti::class, 'fk_surat_keterangan_cuti');
    }

}
