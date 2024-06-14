<?php

namespace App\Http\Livewire\Cadastros\Projeto;

use Livewire\Component;
Use App\Models\Cadastros\Cliente;
Use App\Models\Cadastros\Empresa;
Use App\Models\Cadastros\Projeto;
use App\Models\User;
use App\ModeProjeto;
use Illuminate\Support\Facades\Auth;

class ModalProjetos extends Component
{

    public $descricao;
    public $status;
    public $empresa_id;
    public $projeto_id;
    public $cliente_id;
    public $action;

    protected $listeners = ['eventAction'];

    public function render()
    {
        $acesso = "12"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }
        $this->user = User::find(Auth::user()->id);
        $empresas = Empresa::where('id', $this->user->empresa_id)->get();
        $clientes = Cliente::where('empresa_id', $this->user->empresa_id)->get();
        $this->empresa_id = $this->user->empresa_id;
        return view('livewire.cadastros.projeto.modal-projetos',[
            'empresas'=>$empresas,
            'clientes'=>$clientes,
        ]);
    }

    public function eventAction($action,$projeto_id='')
    {
        $this->projeto_id=$projeto_id;
        if($this->projeto_id){
           $this->edit($this->projeto_id);
        }
    }
    public function submit()
    {   
        $this->createOrUpdate();
    }
    public function createOrUpdate()
    {
        //dd( $this->tipo_usuarios_id);
        Projeto::updateOrCreate([
          'id'=> $this->projeto_id  
        ],[
            'descricao' => $this->descricao,
            'status'=> $this->status,
            'empresa_id'=> $this->empresa_id,
            'cliente_id'=> $this->cliente_id,
        ]);

        // $this->emitTo('livewire.cadastros.usuario.show-usuario','$refresh');
        // $this->emit('modalClose','#modalusuarios');
        // $this->reset(); 
        return redirect('/projetos');
    }
    
    public function edit($projeto_id)
    {
     
        $reg = Projeto::find($projeto_id);
        $this->projeto_id=$reg->id;
        $this->descricao=$reg->descricao;
        $this->empresa_id=$reg->empresa_id;
        $this->status=$reg->status;
        $this->cliente_id =$reg->cliente_id;
        
}
}
