<?php

namespace App\Models;

use App\Models\Semester;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Model;

class HistoriMahasiswa extends Model
{
    use HasFactory, HasUlids;


    protected $table = 'histori_mahasiswa';
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
}
