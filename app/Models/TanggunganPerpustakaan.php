<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class TanggunganPerpustakaan extends Model
{
    use HasUlids;

    protected $table = 'tanggungan_perpustakaan';
    protected $guarded = [];


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
