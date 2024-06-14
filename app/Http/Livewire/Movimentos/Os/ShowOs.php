<?php

namespace App\Http\Livewire\Movimentos\Os;

use App\Models\Movimentos\Agenda;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
class ShowOs extends Component
{
    public $agendas;
    public $dtde;
    public $dtate;
    public $dtagenda;
    public $totalhoras;

    public function render()
    {   
        $this->dtagenda ="";
        $this->totalhoras;
        //dd($this->dtate);
        $os = DB::table('oss as a')
                ->join('clientes as b', 'a.cliente_id', '=', 'b.id')
            ->where('a.user_id',Auth::user()->id)
            ->where('a.dtagenda','>=',$this->dtde)
            ->where('a.dtagenda','<=',$this->dtate)
            ->select('a.*','b.nome as cliente')
            ->get();  
            $auxt=0;
            foreach($os as $it){
                $aux=gmdate('H:i',(strtotime( $it->hora_fim ) - strtotime( $it->hora_inicio ) - strtotime( $it->hora_pausa )+ strtotime( $it->hora_traslado )));

                $auxt+=(date_parse($aux)["minute"]/60)+(date_parse($aux)["hour"]);
            }  
            $remainder = $auxt - (int)$auxt; 
            $minutes = 60 * $remainder;

            $this->totalhoras=floor($auxt).":".str_pad($minutes,2, "0", STR_PAD_BOTH );
        $agendas = DB::table('agendas as a')
                    ->leftJoin('oss as b', 'a.id', '=', 'b.agenda_id')
                    ->leftJoin('clientes as c', 'a.cliente_id', '=', 'c.id')
                    ->where('a.user_id', Auth::user()->id)
                    ->select(DB::raw( "a.id,case when c.nome  IS NOT NULL THEN c.nome else a.descricao end   as title,a.dtagenda as start,a.dtagenda as end, 
                                        case when b.agenda_id  IS NOT NULL THEN 'red' else 'green' end as backgroundColor" ) )
                    ->get();
        $this->agendas = json_encode($agendas);
        return view('livewire.movimentos.os.show-os',
        [
            'os'=> $os
        ]);
    }
    public function mount()
    {
        $this->dtde=date("Y-m-01");
        $dtaux=date("Y-m-01",strtotime("1 month"));
        $this->dtate = date("Y-m-d",strtotime($dtaux .'-1 day'));
    }
    
}

// * $entrada = $horario1;
// * $saida = $horario2;
// * $hora1 = explode(":",$entrada);
// * $hora2 = explode(":",$saida);
// * $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
// * $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
// * $resultado = $acumulador2 - $acumulador1;
// * $hora_ponto = floor($resultado / 3600);
// * $resultado = $resultado - ($hora_ponto * 3600);
// * $min_ponto = floor($resultado / 60);
// * $resultado = $resultado - ($min_ponto * 60);
// * $secs_ponto = $resultado;
// * //Grava na variável resultado final
// * $tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
// * echo $tempo;
