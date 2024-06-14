<?php

namespace App\Http\Livewire\Movimentos\Agenda;

use Livewire\Component;
use DB;
use App\Models\Movimentos\Agenda;
Use App\Models\User;
class ListaAgenda extends Component
{

    public $dt;
    public $consultor;
    public $usu;

    protected $listeners = ['listaAgenda'];

    public function render()
    {   
        if($this->dt<>null){
            $agendas = DB::table('agendas as a')
                ->join('clientes as b', 'a.cliente_id', '=', 'b.id')
                ->where('dtagenda',$this->dt)
                ->where('user_id',$this->usu)
                ->select('a.*','b.nome as cliente')
                ->get();
        }else{
            $agendas = array();    
        }
        
        return view('livewire.movimentos.agenda.lista-agenda',
                    [
                        'agendas'=>$agendas
                    ]);
    }

    public function listaAgenda($dt='',$usu='')
    {
        $this->usu=$usu;
  
        $this->dt = $dt;
        $agendas = DB::table('agendas as a')
                ->join('clientes as b', 'a.cliente_id', '=', 'b.id')
                ->where('dtagenda',$this->dt)
                ->where('user_id',$usu)
                ->select('a.*','b.nome as cliente')
                ->get();
        $cons = User::find($usu);
        $this->consultor = $cons->name;

    
    }
}
