<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';
    
    protected $fillable = [
        'user_id',
        'email',
        'token',
        'expires_at',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'expires_at',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function isExpired()
    {
        return $this->expires_at->isPast();
    }
    
    public static function findByToken($token)
    {
        return static::where('token', $token)
            ->where('expires_at', '>', now())
            ->first();
    }
}
