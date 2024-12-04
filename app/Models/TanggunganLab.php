<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
class TanggunganLab extends Model
{
    use HasUlids;

    protected $table = 'tanggungan_lab';
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