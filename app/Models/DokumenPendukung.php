<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPendukung extends Model
{
    use HasUlids, HasFactory;

    protected $guarded = [];

    public function pengajuanBss()
    {
        return $this->belongsTo(PengajuanBss::class);
    }
}
