<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propostas extends Model
{
    protected $fillable = [
        'nome', 'email', 'cpf', 'proposta', 'modelo_id'
    ];
}
