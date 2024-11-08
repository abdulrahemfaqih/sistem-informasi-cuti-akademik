<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function pengajuanBss()
    {
        return $this->hasMany(PengajuanBss::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function historiMahasiswa()
    {
        return $this->hasMany(HistoriMahasiswa::class);
    }
}
