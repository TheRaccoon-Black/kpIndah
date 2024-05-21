<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarAnggota extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function daftarAnggota()
    {
        return $this->belongsTo(DaftarAnggota::class, 'no', 'nama', 'gaji_bersih');
    }

    public function cicilans()
    {
        return $this->hasMany(Cicilan::class, 'pinjaman_id', 'id');
    }
}
