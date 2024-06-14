<?php

namespace App\Models\Movimentos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento //extends Model
{
//    use HasFactory;
    private $dtAgenda;
    private $usuario_id;
    private $cliente_id;
    private $obs;


    public function __construct($dtAgenda, $usuario_id,$cliente_id,$obs)
    {
        $this->dtAgenda=$dtAgenda;
        $this->usuario_id=$usuario_id;
        $this->cliente_id=$cliente_id;
        $this->obs=$obs;
    }

    public function getDtAgenda()
    {
        return $this->dtAgenda;
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function getCliente_id()
    {
            return $this->cliente_id;
    }
    public function getObs()
    {
            return $this->obs;
    }

    public function setDtAgenda($dtAgenda)
    {
        $this->dtAgenda = $dtAgenda;
    }
    
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
    
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }
    
    public function setObs($obs)
    {
        $this->obs = $obs;
    }
}
