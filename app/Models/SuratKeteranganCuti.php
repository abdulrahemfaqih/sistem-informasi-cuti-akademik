<?php

namespace App\Models;

use App\Models\PengajuanBss;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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