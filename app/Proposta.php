<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $fillable = [
        'nome', 'email', 'cpf', 'proposta', 'modelo'
    ];
}
