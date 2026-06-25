<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
    ];

    protected $hidden = [
        'password',
    ];

    public function pindahNamas()
    {
        return $this->hasMany(PindahNama::class, 'admin_id');
    }
}
