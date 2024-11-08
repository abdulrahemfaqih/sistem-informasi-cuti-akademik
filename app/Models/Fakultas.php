<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory, HasUlids;
    protected $guarded = [];

    public function prodi()
    {
        return $this->hasMany(ProgramStudi::class);
    }
}
