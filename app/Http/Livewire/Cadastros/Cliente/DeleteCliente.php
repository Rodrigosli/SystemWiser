<?php

namespace App\Http\Livewire\Cadastros\Cliente;

use Livewire\Component;
use App\Models\Cadastros\Cliente;

class DeleteCliente extends Component
{
    public $cliente_id;
    public $nome;
    protected $listeners = ['eventDelCli'];
    
    public function render()
    {
        return view('livewire.cadastros.cliente.delete-cliente');
    }

    public function eventDelCli($acrion, $cliente_id='')
    {
        $this->cliente_id = $cliente_id;
        $cli= Cliente::find($cliente_id);
        $this->nome = $cli->nome;
       
    }

    public function delete()
    {
        $cli = Cliente::find($this->cliente_id);
        $cli->delete();
        return redirect('/clientes');
        //$this->emitTo('');
    }
}
