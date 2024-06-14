<?php

namespace App\Models\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendencia extends Model
{


    /* # id, descricao, dtinclusao, dtultimoretorno, empresa_id, analista_id, analistaresp_id, cliente_id, created_at, updated_at
 */
    use HasFactory;
    protected $fillable = [
        'descricao', 
        'empresa_id', 
        'analista_id', 
        'analistaresp_id', 
        'cliente_id', 
        'status', 
        'dtinclusao',
        'dtultimoretorno',
    ];
}
