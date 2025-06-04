<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'nomeCompleto',
        'cpf',
        'password'
    ];

    public function banco()
    {
        return $this->hasOne(Conta::class, 'id_user');
    }
}
