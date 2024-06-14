<?php

namespace App\Models\Movimentos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'descricao',   
        'user_id',   
        'cliente_id', 
        'hora_inicio', 
        'hora_fim', 
        'local', 
        'projeto_id',
        'dtagenda',
        'fatura',
        'empresa',
    ];
}
