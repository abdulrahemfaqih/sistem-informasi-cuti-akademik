<?php

namespace App\Models;

use App\Models\Semester;
use App\Models\PengajuanBss;
use App\Models\HistoriMahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahunAjaran extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'tahun_ajaran';
    protected $guarded = [];

    public function pengajuanBss()
    {
        return $this->hasMany(PengajuanBss::class);
    }

    public function semester()
    {
        return $this->hasMany(Semester::class);
    }

    public function historiMahasiswa()
    {
        return $this->hasMany(HistoriMahasiswa::class);
    }
}
