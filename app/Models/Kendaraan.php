<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    use SoftDeletes;

    protected $table = 'kendaraans';

    protected $fillable = [
        'user_id',
        'no_polisi',
        'nama_pemilik',
        'NIK',
        'merk',
        'tipe',
        'jenis',
        'tahun_pembuatan',
        'warna',
        'no_rangka',
        'no_mesin',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pindahNamas()
    {
        return $this->hasMany(PindahNama::class);
    }
}
