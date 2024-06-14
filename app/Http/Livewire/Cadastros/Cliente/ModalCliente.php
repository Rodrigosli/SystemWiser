<?php

namespace App\Http\Livewire\Cadastros\Cliente;

use Livewire\Component;
use App\Models\User;
use App\Models\Cadastros\Empresa;
use App\Models\Cadastros\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\FacClienteth;

class ModalCliente extends Component
{
    public $message;
    public $titulo="Incluir";
    public $nome; 
    public $cgc;
    public $endereco;
    public $numero;
    public $cidade;
    public $complemento;
    public $estado;
    public $cep;
    public $telefone;
    public $email;
    public $inscricao_municipal;
    public $inscricao_estadual;
    public $razao_social;
    public $status;
    public $valor_hora;
    public $empresa_id;    
    public $cliente_id; 
    public $action;
    public $clienteid;

    protected $listeners = ['eventAction'];

    public function render()
    {
        $this->user = User::find(Auth::user()->id);
        $empresas = Empresa::where('id', $this->user->empresa_id)->get();
        return view('livewire.cadastros.cliente.modal-cliente',[
            'empresas'=>$empresas,
        ]);
    }
    public function submit()
    {
        $this->createOrUpdate();
    }

    public function eventAction($action, $cliente_id='')
    {   
      
        $this->$action = $action;
        if($cliente_id){
            $this->edit($cliente_id);
        }
    }


    public function createOrUpdate()
    {
        Cliente::updateOrCreate([
          'id'=> $this->clienteid  
        ],[
            'nome' => $this->nome,
            'cgc' => $this->cgc,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'cidade' => $this->cidade,
            'complemento' => $this->complemento,
            'estado' => $this->estado,
            'cep' => $this->cep,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'inscricao_municipal' => $this->inscricao_municipal,
            'inscricao_estadual' => $this->inscricao_estadual,
            'razao_social' => $this->razao_social,
            'status' => $this->status,
            'valor_hora' => $this->valor_hora,
            'empresa_id' => $this->empresa_id
        ]);

        $this->emitTo('livewire.cadastros.cliente.show-cliente','$refresh');
        $this->emit('modalClose','#exampleModal');
        $this->reset(); 
        return redirect('/clientes');
    }
    public function edit($cliente_id)
    {
     
        $cli = Cliente::find($cliente_id);
        $this->clienteid=$cli->id;
        $this->nome=$cli->nome;
        $this->cgc=$cli->cgc;
        $this->endereco=$cli->endereco;
        $this->numero=$cli->numero;
        $this->cidade=$cli->cidade;
        $this->complemento=$cli->complemento;
        $this->estado=$cli->estado;
        $this->cep=$cli->cep;
        $this->telefone=$cli->telefone;
        $this->email=$cli->email;
        $this->inscricao_municipal=$cli->inscricao_municipal;
        $this->inscricao_estadual=$cli->inscricao_estadual;
        $this->razao_social=$cli->inscricao_estadual;
        $this->status=$cli->status;
        $this->valor_hora=$cli->valor_hora;
        $this->empresa_id=$cli->empresa_id;
}
}

