<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeteranganCuti extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'surat_keterangan_cuti';
    protected $guarded = [];

    public function pengajuanBss()
    {
        return $this->belongsTo(PengajuanBss::class);
    }
}