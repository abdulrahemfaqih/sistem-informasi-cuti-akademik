<?php

namespace App\Models;

use App\Models\Semester;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use App\Models\DokumenPendukung;
use App\Models\SuratKeteranganCuti;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanBss extends Model
{

    use HasFactory, HasUlids;

    protected $table = 'pengajuan_bss';
    protected $guarded = [];
    public $timestamps = true;

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
        return $this->hasOne(SuratKeteranganCuti::class);
    }

    public function dokumenPendukung()
    {
        return $this->hasMany(DokumenPendukung::class);
    }
}
