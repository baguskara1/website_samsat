<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    
    protected $fillable = [
        'user_id',
        'kendaraan_id',
        'no_polisi',
        'email',
        'nominal',
        'midtrans_transaction_id',
        'status',
        'paid_at',
        'valid_until',
        'midtrans_response',
    ];
    
    protected $casts = [
        'nominal' => 'decimal:2',
        'paid_at' => 'datetime',
        'valid_until' => 'datetime',
        'midtrans_response' => 'array',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
    
    public function isPending()
    {
        return $this->status === 'pending';
    }
    
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
    
    public function isFailed()
    {
        return $this->status === 'failed';
    }
    
    public static function getPrice($vehiclePrice)
    {
        if ($vehiclePrice > 200000000) {
            return 500000; // Mahal
        }
        return 250000; // Murah
    }
}
