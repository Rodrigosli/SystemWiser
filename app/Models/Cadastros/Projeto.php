<?php

namespace App\Models\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'cliente_id', 
        'empresa_id',
        'status'
    ];
}
