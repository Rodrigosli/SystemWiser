<?php

namespace App\Http\Livewire\Movimentos\Os;
use DB;
use Livewire\Component;
use App\Models\Movimentos\Agenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Models\Movimentos\Os;
use App\Models\Cadastros\

{
    Projeto,
    Cliente
};
class CreateOs extends Component
{
    public $dtagenda;
    public $descricao;
    public $hora_inicio;
    public $hora_fim;
    public $projeto_id;
    public $cliente_id;
    public $hora_pausa='00:00';
    public $hora_traslado='00:00';
    public $execucao;
    public $projetos;
    public $clientes;
    public $osid;
    public $agenda_id;
    public $fatura;
    public $empresa;

    protected $rules = [
        'hora_fim' => 'required',
        'hora_inicio' => 'required',
        'dtagenda' => 'required',
        'descricao' => 'required',
        'projeto_id' => 'required',
        'cliente_id' => 'required',
        'fatura' => 'required',
        'execucao' => 'required',
        'empresa' => 'required',
    ];

    protected $listeners = ['osAction'];
    public function render()
    {
        // $this->projetos = Projeto::get();
        $this->projetos  = Projeto::where('cliente_id', $this->cliente_id)->get();
        $this->clientes = Cliente::get();
        return view('livewire.movimentos.os.create-os');
    }
    public function osAction($action,$agenda_id='',$dtagenda='')
    {   
        if ($action=='add'){
            $this->dtagenda = $dtagenda;
        }else{
            $this->agenda_id= $agenda_id;
            $agenda = Agenda::find($agenda_id);
            $this->dtagenda = $agenda->dtagenda;
            $this->descricao= $agenda->descricao;
            $this->hora_inicio= $agenda->hora_inicio;
            $this->hora_fim= $agenda->hora_fim;
            $this->projeto_id= $agenda->projeto_id;
            $this->cliente_id= $agenda->cliente_id;  
            $this->dtagenda= $agenda->dtagenda;  
            $this->fatura= $agenda->fatura;  
            $this->empresa= $agenda->empresa;  

            $this->clientes = Cliente::find($this->cliente_id);
        }
        
        
    }
   
    public function submit()
    {
        $this->validate();

        Os::updateOrCreate([
            'id'=> $this->osid
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
        //     $pdf = PDF::loadView('emails.teste',
        //                 [
        //                     'dtagenda' => $this->dtagenda,
        //                     'descricao'=> $this->descricao,
        //                     'hora_inicio'=> $this->hora_inicio,
        //                     'hora_fim'=> $this->hora_fim,
        //                     'hora_pausa'=>$this->hora_pausa,            
        //                     'projeto_id'=> $this->projeto_id,
        //                     'cliente_id'=> $this->cliente_id, 
        //                     'hora_traslado'=> $this->hora_traslado, 
        //                     'execucao'=> $this->execucao, 
        //                     'user_id'=> Auth::user()->id, 
        //                     'agenda_id'=> $this->agenda_id,
        //                 ]);
        //     $m->from('sistemas@harpiaconsultoria.com','Sistemas');
        //     $m->to('rodrigo@harpiaconsultoria.com');
        //     $m->attachData($pdf->output(), 'os.pdf');
        //  });
         return redirect('/os');
    }

    public function change(){

        $this->projetos  = Projeto::where('cliente_id', $this->cliente_id)->get();

    }

    
}
