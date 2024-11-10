<?php

namespace App\Models;

use App\Models\PengajuanBss;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DokumenPendukung extends Model
{
    use HasUlids, HasFactory;


    protected $table = 'dokumen_pendukung';
    protected $guarded = [];

    public function pengajuanBss()
    {
        return $this->belongsTo(PengajuanBss::class);
    }
}
