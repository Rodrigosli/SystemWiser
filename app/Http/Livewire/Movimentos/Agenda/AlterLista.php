<?php

namespace App\Http\Livewire\Movimentos\Agenda;
use App\Models\Cadastros\Cliente;
use App\Models\User;
use DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Movimentos\Agenda;


class AlterLista extends Component
{
    public $agenda_id;
    public $descricao;
    public $dtagenda;
    public $user_id;
    public $cliente_id;
    public $hora_inicio;
    public $hora_fim;
    public $local;
    public $projeto_id;
    public $proj;

    protected $listeners = ['eventAction'];

    public function render()
    {
        if (Auth::user()->name=='admin'){
            $clientes = Cliente::get();
            $user = User::Get();
        }else{
            $user = DB::table('users')
                ->where('empresa_id',Auth::user()->empresa_id)
                ->get();
            $clientes = DB::table('clientes')
            ->where('empresa_id',Auth::user()->empresa_id)
            ->get();
        }
          
             
        $proj = DB::table('projetos')
                ->where('cliente_id',$this->cliente_id)
                ->get();
        return view('livewire.movimentos.agenda.alter-lista',
        [
            'usuarios'=>$user,
            'clientes'=>$clientes,
            'projetos'=>$proj,
        ]);
    }
    public function eventAction($action,$agenda_id='')
    {   
        $this->reset();
        if($agenda_id<>999999){
            $agenda = Agenda::Find($agenda_id);
            if($agenda!=null){
                $this->agenda_id = $agenda->id;
                $this->descricao=$agenda->descricao;
                $this->dtagenda=$agenda->dtagenda;
                $this->user_id=$agenda->user_id;
                $this->cliente_id=$agenda->cliente_id;
                $this->hora_inicio=$agenda->hora_inicio;
                $this->hora_fim=$agenda->hora_fim;
                $this->local=$agenda->local;
                $this->projeto_id=$agenda->projeto_id;     
            }
            
        }
    }
}
