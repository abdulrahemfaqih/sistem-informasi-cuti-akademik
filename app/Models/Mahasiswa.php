<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'mahasiswa';
    protected $guarded = [];


    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function historiMahasiswa()
    {
        return $this->hasMany(HistoriMahasiswa::class);
    }

    public function pengajuanBss()
    {
        return $this->hasMany(PengajuanBss::class);
    }
}

