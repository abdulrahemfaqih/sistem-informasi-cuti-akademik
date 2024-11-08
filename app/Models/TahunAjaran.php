<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
