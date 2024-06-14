<?php

namespace App\Models\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 
        'cgc',
        'endereco',
        "numero",
        "cidade",
        "complemento",
        "estado",
        "cep",
        "telefone",
        "email",
        "inscricao_municipal",
        "inscricao_estadual",
        "razao_social",
        "status",
        'valor_hora','empresa_id',
    ];
}
