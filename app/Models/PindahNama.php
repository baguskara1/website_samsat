<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PindahNama extends Model
{
    protected $table = 'pindah_nama';

    protected $fillable = [
        'kendaraan_id',
        'nama_pemilik_lama',
        'nik_pemilik_lama',
        'nama_pemilik_baru',
        'nik_pemilik_baru',
        'alamat_pemilik_baru',
        'no_telepon_pemilik_baru',
        'email_pemilik_baru',
        'alasan_pindah_nama',
        'dokumen_ktp_lama',
        'dokumen_ktp_baru',
        'dokumen_bpkb',
        'dokumen_stnk',
        'dokumen_kwitansi',
        'status',
        'catatan_admin',
        'tanggal_pengajuan',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
