<?php

namespace App\Http\Livewire\Movimentos\Agenda;

use App\Models\Cadastros\Cliente;
use App\Models\User;
use DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Movimentos\Agenda;

class ModalAgenda extends Component
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
    public $fatura;
    public $empresa;

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
        
        return view('livewire.movimentos.agenda.modal-agenda',
                [
                    'usuarios'=>$user,
                    'clientes'=>$clientes,
                    'projetos'=>$proj,
                ]);
    }

        //                       'add' ,''           ,'{{$agendas[$i][$ni]['data']}}',{{$agendas[$i][$ni]['user_id']}},'','','','','')
    public function eventAction($action,$agenda_id='',$dtagenda='',$user_id='',$cliente_id='',$hora_inicio='',$hora_fim='',$local='',$projeto_id='',$fatura='',$empresa='')
    {   
        $this->reset();
  
        if ($action=='add'){
           // dd($cliente_id);
            $this->dtagenda=$dtagenda;
            $this->user_id=$user_id;
        }else{
            $agenda = DB::table('agendas')
            ->where('id',$agenda_id)
            ->get();
            $agenda = Agenda::find($agenda_id);

           //dd($agenda);
            if ($agenda_id!='' && $agenda_id<>0){
                $this->agenda_id = $agenda_id;
                $this->descricao=$agenda->descricao;
                $this->empresa=$agenda->empresa;
                $empresa=$agenda->empresa;
            }
           
            $this->dtagenda=$dtagenda;
            $this->user_id=$user_id;
            $this->cliente_id=$cliente_id;
            $this->hora_inicio=$hora_inicio;
            $this->hora_fim=$hora_fim;
            $this->local=$local;
            $this->projeto_id=$projeto_id;
            $this->fatura=$fatura;
            $this->empresa=$empresa;
        }
        
           
        
    }

    public function change($value)
    {
        
        $this->cliente_id = $value;
        // if(!empty($this->cliente_id)) {
        //     $proj = DB::table('projetos')
        //     ->where('cliente_id',$this->cliente_id)
        //     ->get();
        // }
        $this->showTable = true;
        
    }

    public function submit()
    {

        Agenda::updateOrCreate([
            'id'=>  $this->agenda_id
          ],[
              'descricao'=>$this->descricao,
              'dtagenda'=>$this->dtagenda,
              'user_id'=>$this->user_id,
              'cliente_id'=>$this->cliente_id,
              'hora_inicio'=>$this->hora_inicio,
              'hora_fim'=>$this->hora_fim,
              'local'=>$this->local,
              'projeto_id'=>$this->projeto_id,
              'fatura'=>$this->fatura,
              'empresa'=>$this->empresa,
          ]);


          return redirect('/agenda');
    }
}
