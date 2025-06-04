<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    protected $table = 'operacoes';

    protected $fillable = [
        'tipo',
        'valor',
        'id_conta',
    ];
}
