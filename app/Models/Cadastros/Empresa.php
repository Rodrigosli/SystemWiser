<?php

namespace App\Models\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'cnpj', 
        'endereco',
        'numero',
        'bairro',
        'complemento',
        'cep',
        'cidade',
        'inscricao_numicipal',
        'inscricao_estadual'
    ];
}
