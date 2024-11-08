<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriMahasiswa extends Model
{
    use HasFactory, HasUlids;
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
