<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanBss extends Model
{

    use HasFactory, HasUlids;

    protected $table = 'pengajuan_bss';
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
        return $this->hasOne(SuratKeteranganCuti::class);
    }

    public function dokumenPendukung()
    {
        return $this->hasMany(DokumenPendukung::class);
    }
}
