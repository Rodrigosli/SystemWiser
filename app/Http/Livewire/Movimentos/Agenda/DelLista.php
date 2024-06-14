<?php

namespace App\Http\Livewire\Movimentos\Agenda;

use Livewire\Component;
Use App\Models\User;
Use App\Models\Cadastros\Projeto;
use App\Models\Movimentos\Agenda;

class DelLista extends Component
{
    public $action;
    public $rotina;
    public $diversos_id;
    public $descricao;
    
    protected $listeners = ['eventdel'];

    public function render()
    {
        return view('livewire.movimentos.agenda.del-lista');
    }


    public function eventdel($action,$rotina, $diversos_id='')
    {  
        $this->action = $action;
        $this->diversos_id = $diversos_id; 
        $this->rotina = $rotina;
        if( $this->rotina=='User'){
            $cli = User::find($this->diversos_id);
            $this->descricao = $cli->name;
        }
        if( $this->rotina=='Projeto'){
            $reg = Projeto::find($this->diversos_id);
            $this->descricao = $reg->descricao;
        }
    }
    
    public function delete()
    {
       
        if( $this->rotina=='Agenda'){
            if($this->diversos_id<>0){
                $reg = Agenda::find($this->diversos_id);
                $reg->delete();
                return redirect('/agenda');
                //$this->emitTo('');
            }
        }
    }
}
