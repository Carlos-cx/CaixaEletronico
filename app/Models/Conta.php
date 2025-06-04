<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
        'id_user',
        'saldo'
    ];

    protected $guarded = [];

    public function operacao()
    {
        return $this->hasOne(Operacao::class, 'id_conta');
    }
}
