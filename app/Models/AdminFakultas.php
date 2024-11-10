<?php

namespace App\Models;

use App\Models\User;
use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminFakultas extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];
    protected $table = 'admin_fakultas';
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
