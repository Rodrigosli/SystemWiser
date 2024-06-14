<?php

namespace App\Http\Livewire\Movimentos\Agenda;
use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Movimentos\Agenda;
use App\Models\User;
use App\Models\Cliente;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Movimentos\Agendamento;
use DateTime;
class MainAgenda extends Component
{
    public $usuario;
    public $dtinicio;
    public $dtfim; 
    public $xdtfim; 
    public $dias; 
    public $xdias; 
    public $agenda_id;

    public $descricao;
    public $dtagenda;
    public $user_id;
    public $cliente_id;
    public $hora_inicio;
    public $hora_fim;
    public $local;
    public $fatura;
    public $clientes;
    public $analistas;
    public $analista_id;
    public $cli_id;

    protected $listeners = ['eventAction'];


    public function render()
    {        
        $acesso = "12"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }

        $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'); 
        $this->usuario = User::find(Auth::user()->id);
        $this->dias = date_diff(date_create($this->dtinicio), date_create($this->dtfim))->format('%a');
        $dt =  date("Y-m-d",strtotime($this->dtinicio));//date("Y-m-d",strtotime('+1 days', strtotime($this->dtinicio))) ; //$this->dtinicio
        
        $arrayAgenda=array();
        $cole = collect();
        $datas=array();
        $Usr = User::find(Auth::user()->id);
        if (Auth::user()->name=='admin'){
            $usrs = User::get();
        }else{
            $usrs = User::where('empresa_id', $Usr->empresa_id)
            ->where('id', '<>', 1)->get();
        }
        if(!empty($this->analista_id)){
           // dd($this->analista_id);
           $usrs = User::where('empresa_id', $Usr->empresa_id)
                ->where('id', '=', $this->analista_id)->get();
        }
        $usecole = array();
        foreach($usrs as $usr){
            
            $agen=DB::table('agendas')
                    ->join('clientes', 'agendas.cliente_id', '=', 'clientes.id')
                    ->where('agendas.dtagenda',date('Y-m-d',strtotime($dt)))
                    ->where('agendas.user_id',$usr->id)
                    ->select('agendas.*','clientes.nome as cliente')
                    ->get();

            if(!empty($this->cli_id)){
                $agen=DB::table('agendas')
                ->join('clientes', 'agendas.cliente_id', '=', 'clientes.id')
                ->where('agendas.dtagenda',date('Y-m-d',strtotime($dt)))
                ->where('agendas.user_id',$usr->id)
                ->where('clientes.id',$this->cli_id)
                ->select('agendas.*','clientes.nome as cliente')
                ->get();
            }
            $cont=0;
            $diasemana_numero = date('w', strtotime($dt));
            $aCli = array();
            foreach($agen as $agd){
                $cont++;
                array_push($aCli,[$agd->cliente]);
            }
            if($cont>0){
                $aux=0;
                foreach($agen as $agd){
                    if($aux==0){
                        array_push($usecole,['data'=>$dt ,'user_id'=>$usr->id,'nome'=>$usr->name,'cliente_nome'=>$agd->cliente,'cliente_id'=>$agd->cliente_id,'obs'=>$agd->descricao,'hrini'=>$agd->hora_inicio,'hrfim'=>$agd->hora_fim,"local"=>$agd->local,'agenda_id'=>$agd->id, 'projeto_id'=>$agd->projeto_id,'dia'=>$diasemana[$diasemana_numero],'outros'=>$cont,'clientes'=>$aCli,'fatura'=>$agd->fatura]); 
                        $aux++;
                    }
                }
            }
                          
            if($cont==0){
                array_push($usecole,['data'=>$dt ,'user_id'=>$usr->id,'nome'=>$usr->name,'cliente_nome'=>'','cliente_id'=>'_','obs'=>'LIVRE','hrini'=>"08:00",'hrfim'=>"18:00","local"=>"Remoto",'agenda_id'=>999999, 'projeto_id'=>0,'dia'=>$diasemana[$diasemana_numero],'outros'=>$cont,'clientes'=>array(),'fatura'=>'']); 
            }  
        }
        $diasemana_numero = date('w', strtotime($dt));
        array_push($datas,[$dt,$diasemana[$diasemana_numero]]);
        $cole->push($usecole);

        for ($i = 1; $i <= $this->dias; $i++) {
            $dt =  date("Y-m-d",strtotime('+'.$i.' days', strtotime($this->dtinicio)));
            $diasemana_numero = date('w', strtotime($dt));
            array_push($datas,[$dt,$diasemana[$diasemana_numero]]);
            $usecole = array();
            foreach($usrs as $usr){
                $agen=DB::table('agendas')
                    ->join('clientes', 'agendas.cliente_id', '=', 'clientes.id')
                    ->where('agendas.dtagenda',date('Y-m-d',strtotime($dt)))
                    ->where('agendas.user_id',$usr->id)
                    ->select('agendas.*','clientes.nome as cliente')
                    ->get();
                    // if(!empty($this->cli_id)){
                    //     $agen=DB::table('agendas')
                    //     ->join('clientes', 'agendas.cliente_id', '=', 'clientes.id')
                    //     ->where('agendas.dtagenda',date('Y-m-d',strtotime($dt)))
                    //     ->where('agendas.user_id',$usr->id)
                    //     ->where('clientes.id',$this->cli_id)
                    //     ->select('agendas.*','clientes.nome as cliente')
                    //     ->get();
                    // }
                $cont=0;
                $aCli = array();
                foreach($agen as $agd){
                    $cont++;
                    array_push($aCli,[$agd->cliente]);
                }
                if($cont > 0){
                    $naux=0;
                    foreach($agen as $agd){
                        if ($naux==0){
                            array_push($usecole,['data'=>$dt ,'user_id'=>$usr->id,'nome'=>$usr->name,'cliente_nome'=>$agd->cliente,'cliente_id'=>$agd->cliente_id,'obs'=>$agd->descricao,'hrini'=>$agd->hora_inicio,'hrfim'=>$agd->hora_fim,"local"=>$agd->local,'agenda_id'=>$agd->id, 'projeto_id'=>$agd->projeto_id,'dia'=>$diasemana[$diasemana_numero],'outros'=> $cont,'clientes'=>$aCli,'fatura'=>$agd->fatura]);
                            $naux++;
                        }
                         
                    }   
                }        
                if($cont==0){
                    array_push($usecole,['data'=>$dt ,'user_id'=>$usr->id,'nome'=>$usr->name,'cliente_nome'=>'','cliente_id'=>'_','obs'=>'LIVRE','hrini'=>"08:00",'hrfim'=>"18:00","local"=>"Remoto","agenda_id"=>0, 'projeto_id'=>0,'dia'=>$diasemana[$diasemana_numero],'outros'=>$cont,'clientes'=>array(),'fatura'=>'']); 
                }      
            }
            //
            $cole->push($usecole);
        }

        $usuarios= User::where('empresa_id',$this->usuario->empresa_id)
        ->get();

        $clientes = Cliente::get();
        $this->clientes = Cliente::get();
        $this->analistas = User::get();
        $analistas = User::Get();
        if(!empty($this->cli_id)){

                $agen2=DB::table('agendas')
                ->join('clientes', 'agendas.cliente_id', '=', 'clientes.id')
                ->where('agendas.dtagenda','>=',date('Y-m-d',strtotime($this->dtinicio)))
                ->where('agendas.dtagenda','<',date('Y-m-d',strtotime($this->dtfim)))
                ->where('clientes.id',$this->cli_id)
                ->select('agendas.*','clientes.nome as cliente')
                ->get();
                //dd($agen2);
                // $max = sizeof($datas);
                // for($ni=0;$ni<$max;$ni++){
                //     $key = array_search($datas[$ni][0], $agen2);
                //     if($key!==false){
                //     }
                // }

        }
        return view('livewire.movimentos.agenda.main-agenda',
        [
            'usuarios'=>$usuarios,
            'agendas' => $cole,
            'datas'=>$datas,
            'clientes'=>$clientes,
            'analistas'=>$analistas,
        ]);
    }
    public function mount()
    {
        $this->dtfim=date("Y-m-d",strtotime("30 day")); 
        $this->dtinicio=date("Y-m-d"); 
    }

    public function btnPlus($action,$agenda_id='',$dtagenda='',$user_id='',$cliente_id='',$hora_inicio='',$hora_fim='',$local='',$projeto_id='',$fatura='')
    {   
        $this->reset();

        $user = DB::table('users')
        ->where('id',$user_id)
        ->get();
        dd($user);

        if ($action=='add'){
           // dd($cliente_id);
            $this->dtagenda=$dtagenda;
            $this->user_id=$user_id;
           
        }else{
            $agenda = DB::table('agendas')
            ->where('id',$agenda_id)
            ->get();
            $agenda = Agenda::find($agenda_id);

           
            if ($agenda_id!='' && $agenda_id<>0){
                $this->agenda_id = $agenda_id;
                $this->descricao=$agenda->descricao;
            }
           
            $this->dtagenda=$dtagenda;
            $this->user_id=$user_id;
            $this->cliente_id=$cliente_id;
            $this->hora_inicio=$hora_inicio;
            $this->hora_fim=$hora_fim;
            $this->local=$local;
            $this->projeto_id=$projeto_id;
            $this->fatura=$fatura;
        }
        
           
        
    }
    public function eventAction($action,$agenda_id='',$dtagenda='',$user_id='',$cliente_id='',$hora_inicio='',$hora_fim='',$local='',$projeto_id='',$fatura='',$empresa='')
    { 

    }
}
