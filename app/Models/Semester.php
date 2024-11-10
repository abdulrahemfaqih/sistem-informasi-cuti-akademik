<?php

namespace App\Models;

use App\Models\TahunAjaran;
use App\Models\PengajuanBss;
use App\Models\HistoriMahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'semester';
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
