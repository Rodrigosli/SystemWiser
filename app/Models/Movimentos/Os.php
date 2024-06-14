<?php

namespace App\Models\Movimentos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Os extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',   
        'hora_inicio',   
        'hora_fim', 
        'hora_pausa', 
        'hora_fim', 
        'hora_traslado', 
        'projeto_id',
        'user_id',
        'execucao',
        'agenda_id',
        'cliente_id',
        'dtagenda',
        'fatura',
        'empresa',
    ];
    protected $table = 'oss';

}
