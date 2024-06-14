<?php

namespace App\Http\Livewire\Cadastros\Pendencias;

use Livewire\Component;
Use App\Models\Cadastros\Pendencia;
use App\Models\User;
use App\Models\Cliente;

class IncluiPendencia extends Component
{
    
    public $descricao;
    public $cliente_id;
    public $analista_id;

    protected $listeners = ['incpendencia'];
    

    public function render()
    {
        $clientes = Cliente::get();
        $this->clientes = Cliente::get();
        $this->analistas = User::get();
        $analistas = User::Get();
        return view('livewire.cadastros.pendencias.inclui-pendencia',
            [
                'clientes'=>$clientes,
                'analistas'=>$analistas,
            ]);
    }

    public function incendencia()
    {
       dd("teste");
    }
    public function submit()
    {
        //dd($this->analista_id);
        Pendencia::updateOrCreate([
            'id'=>  9999999
          ],[
              'descricao'=>$this->descricao,
              'dtinclusao'=>date("Y-m-d"),
              'empresa_id'=>1,
              'cliente_id'=>$this->cliente_id,
              'analista_id'=>$this->analista_id,
              'analistaresp_id'=>$this->analista_id,
              'status'=>'0', //0-inclusao;1-em andamento;9-FINALIZADO
          ]);


          return redirect('/pendencias');
    }
}
