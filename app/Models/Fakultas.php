<?php

namespace App\Models;

use App\Models\ProgramStudi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'fakultas';
    protected $guarded = [];

    public function prodi()
    {
        return $this->hasMany(ProgramStudi::class);
    }
}
