<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Cadastros\
{
    Projeto,
    Cliente
};
use DB;
class DashboardAnalista extends Component
{
    public $agenda_id;
    public $descricao;
    public $cliente_id;
    public $clientes;
    public $pendencias;
    public $execucao;
    public Collection $execucoes;
    public $nitem =0 ;


    public function render()
    {
        $this->clientes = Cliente::get();




        $agenda = DB::table('agendas as a')
            ->join('clientes as b', 'a.cliente_id', '=', 'b.id')
            ->where('a.user_id',Auth::user()->id)
            ->where('a.dtagenda',date("Y-m-d"))
            ->select('a.*','b.nome as cliente')
            ->get(); 
            //dd($agenda);
            foreach($agenda as $item){
                $this->cliente_id = $item->cliente_id;
                break; 
            }
            if(strlen($this->cliente_id)>0){
                $this->pendencias = DB::table('pendencias as a')
                    ->where('a.analistaresp_id',Auth::user()->id)
                    ->where('a.cliente_id',$this->cliente_id)
                    ->get(); 
            }
             foreach($this->pendencias  as $item){
                $this->addExec();
             }   

        return view('livewire.dashboard-analista',
        [
            'agendas'=> $agenda,
            
        ]
        );
    }
    public function salva_exec($idpendencia){
       dd($this->execucoes);
    }


    public function addExec()
    {   
        $this->nitem=0;
        $this->pendencias = DB::table('pendencias as a')
        ->where('a.analistaresp_id',Auth::user()->id)
        ->where('a.cliente_id',$this->cliente_id)
        ->get(); 
        foreach($this->pendencias as $item){
            if($this->nitem==0){
                $this->fill([
                    'execucoes' => collect([['iditens' => $item->id]]),
                ]);
            }else{
                $this->execucoes->push(['iditens' => $item->id]);
            }
            $this->nitem++;
        }
        
        
        
  }
}
