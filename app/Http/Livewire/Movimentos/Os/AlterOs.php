<?php

namespace App\Http\Livewire\Movimentos\Os;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Movimentos\Os;
use App\Models\Cadastros\
{
    Projeto,
    Cliente
};

class AlterOs extends Component
{
    public $OsId;
    public $projetos;
    public $clientes;
    public $cliente_id;
    public $projeto_id;
    public $descricao;
    public $hora_inicio;
    public $hora_fim;
    public $hora_traslado;
    public $hora_pausa;
    public $execucao;
    public $dtagenda;
    public $agenda_id;
    public $fatura;
    public $empresa;
    
    protected $listeners = ['osActionAlt'];

    public function render()
    {
        $this->projetos = Projeto::get();
        $this->clientes = Cliente::get();
        $oss = Os::where('id', $this->OsId)->get();
        return view('livewire.movimentos.os.alter-os');
    }

    public function osActionAlt($action,$OsId='',$dtagenda='')
    {   
        if ($action=='add'){
            $this->dtagenda = $dtagenda;
        }else{
            $this->OsId= $OsId;
            $agenda = Os::find($OsId);
            $this->dtagenda = $agenda->dtagenda;
            $this->descricao= $agenda->descricao;
            $this->hora_inicio= $agenda->hora_inicio;
            $this->hora_fim= $agenda->hora_fim;
            $this->projeto_id= $agenda->projeto_id;
            $this->cliente_id= $agenda->cliente_id;  
            $this->hora_pausa= $agenda->hora_pausa;  
            $this->hora_traslado= $agenda->hora_traslado;  
            $this->dtagenda= $agenda->dtagenda;  
            $this->execucao= $agenda->execucao;  
            $this->agenda_id = $agenda->agenda_id;
            $this->fatura = $agenda->fatura;
            $this->empresa = $agenda->empresa;

            $this->clientes = Cliente::find($this->cliente_id);
            $this->projetos = Projeto::find($this->projeto_id);
        }
    } 
    public function submit()
    {

        Os::updateOrCreate([
            'id'=> $this->OsId
          ],[
            'dtagenda' => $this->dtagenda,
            'descricao'=> $this->descricao,
            'hora_inicio'=> $this->hora_inicio,
            'hora_fim'=> $this->hora_fim,
            'hora_pausa'=>$this->hora_pausa,            
            'projeto_id'=> $this->projeto_id,
            'cliente_id'=> $this->cliente_id, 
            'hora_traslado'=> $this->hora_traslado, 
            'execucao'=> $this->execucao, 
            'user_id'=> Auth::user()->id, 
            'agenda_id'=> $this->agenda_id, 
            'fatura'=> $this->fatura, 
            'empresa'=> $this->empresa, 
          ]);
        
        // //return $pdf->setPaper('a4')->download('nome_pdf.pdf');
        // Mail::Send('emails.teste',['Teste'=>'rrrrrr'],function($m){
        //     $pdf = PDF::loadView('emails.teste',['Teste'=>"Rodrigo"]);
        //     $m->from('sistemas@harpiaconsultoria.com','Sistemas');
        //     $m->to('rodrigo@harpiaconsultoria.com');
        //     $m->attachData($pdf->output(), 'os.pdf');
        //  });
         return redirect('/os');
    }
}
