<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';

    protected $fillable = [
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
    ];

    public function pindahNamas()
    {
        return $this->hasMany(PindahNama::class);
    }
}
