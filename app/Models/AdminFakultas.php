<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminFakultas extends Model
{
    use HasFactory, HasUlids;
    
    protected $guarded = [];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
