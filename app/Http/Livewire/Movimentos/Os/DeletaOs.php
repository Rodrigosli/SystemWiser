<?php

namespace App\Http\Livewire\Movimentos\Os;

use Livewire\Component;
use App\Models\Movimentos\Os;

class DeletaOs extends Component
{
    public $diversos_id;
    public $cliente;
    public $dataos;
    protected $listeners = ['eventdel'];

    public function render()
    {
        return view('livewire.movimentos.os.deleta-os');
    }

    public function eventdel($action,$id,$cliente,$dt)
    {  
        //  dd($dt);
        $this->action = $action;
        $this->cliente = $cliente;
        $this->dataos = date("d/m/Y", strtotime($dt));
        $this->diversos_id = $id;
    
    }
    public function delete()
    {
    
            if($this->diversos_id<>0){
                $reg = Os::find($this->diversos_id);
                $reg->delete();
                return redirect('/os');
            }

    }
    public function cancela()
    {   
        dd($this->diversos_id);
        return redirect('/os');
    }
}
