<?php

namespace App\Http\Livewire\Movimentos\Agenda;
use DB;
use Livewire\Component;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Cadastros\Projeto;
use Illuminate\Support\Facades\Auth;
use App\Models\Movimentos\Agenda;

class AddVarios extends Component
{
    public $id_usuario_t;
    public $usuarios;
    public $clientes;
    public $projetos;
    public $cliente_id;
    public $dtMult=array();
    public $agenda_id;
    public $descricao;
    public $dtagenda;
    public $user_id;
    public $hora_inicio;
    public $hora_fim;
    public $local;
    public $projeto_id;
    public $proj;
    public $fatura;
    public $empresa;
    


    protected $listeners = ['eventVarios', 'addData','remData'];

    public function render()
    {
        $this->projetos = DB::table('projetos')
                ->where('cliente_id',$this->cliente_id)
                ->get();
        $this->usuarios = DB::table('users')
                ->where('empresa_id',Auth::user()->empresa_id)
                ->get();
        $clientes = Cliente::get();
        $this->clientes = Cliente::get();
        return view('livewire.movimentos.agenda.add-varios');
    }



    public function eventVarios($action,$id_usuario)
    {
          //dd($id_usuario);
          $this->id_usuario_t = $id_usuario;
          $usuarios = User::where('id', $id_usuario)->get();
          $this->usuarios = $usuarios;
    }
    public function change($value)
    {
        
        $this->cliente_id = $value;
       // dd($value);
        // $this->showTable = true;
        
    }
    public function addData($dtNAgend){
        $this->dtMult = array_diff($this->dtMult, array($dtNAgend));
        array_push($this->dtMult,$dtNAgend);
        //dd($this->dtMult);
    }
    public function remData($dtNAgend){
        $this->dtMult = array_diff($this->dtMult, array($dtNAgend));
    }
    public function submit()
    {

        //dd($this->id_usuario_t);
        foreach($this->dtMult as $item){

            $data = str_replace("/", "-", $item);
            $DataFormatada =  date('Y-m-d', strtotime($data));

            Agenda::updateOrCreate([
                'id'=>  $this->agenda_id
            ],[
                'descricao'=>$this->descricao,
                'dtagenda'=>$DataFormatada,
                'user_id'=>$this->id_usuario_t,
                'cliente_id'=>$this->cliente_id,
                'hora_inicio'=>$this->hora_inicio,
                'hora_fim'=>$this->hora_fim,
                'local'=>$this->local,
                'projeto_id'=>$this->projeto_id,
                'fatura'=>$this->fatura,
                'empresa'=>$this->empresa,
            ]);
        }
          return redirect('/agenda');
    }

}
