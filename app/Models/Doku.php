<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doku extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kat_id','id');
    }
}
