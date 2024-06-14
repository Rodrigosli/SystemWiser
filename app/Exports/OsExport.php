<?php

namespace App\Exports;

use App\Models\Movimentos\Os;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OsExport implements FromView
{
    private $datade;
    private $dataate;
    private $cliente;
    private $analista;

    public function __construct(string $datade,string $dataate,int $cliente,int $analista)
    {
        $this->datade = $datade;
        $this->dataate =$dataate;
        $this->cliente =$cliente;
        $this->analista =$analista;
        
    }
    public function view(): View
    {
        $cQuery = "SELECT a.id, a.dtagenda,b.nome, c.name,a.hora_inicio,a.hora_fim,a.hora_pausa,hora_traslado,d.descricao projeto ,a.fatura,a.execucao,a.empresa
                    FROM slidi.oss a
                    inner join slidi.clientes  b
                        on a.cliente_id = b.id
                    inner join slidi.users c
                        on a.user_id = c.id
                    left join slidi.projetos d
                        on a.cliente_id = d.cliente_id
                        and a.projeto_id = d.id
                    where dtagenda>='".$this->datade."'
                    and dtagenda <= '".$this->dataate."'
                order by a.dtagenda";
        
        $planilha = DB :: select ( $cQuery);
        return view('livewire.relatorios.relacao-os', compact('planilha'));
    }
}
