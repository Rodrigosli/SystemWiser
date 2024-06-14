<div>

    <div class="row">
        <div class="col">
            <div class="col">Data Inicio</div>
            
            <input type="date" class="form-control"  wire:model="dtinicio">
        </div>
        
        <div class="col">
            <div class="col">Data Fim</div>
            <input type="date" class="form-control" wire:model="dtfim"   >
        </div>

        <div class="col">
            <div class="col">Cliente</div>
            <select class="form-control" id="cliente" wire:model="cli_id" name="cliente">
                <option></option>
                @foreach ($clientes as $item)
                <option value="{{$item->id}}">{{$item->nome}}</option>
                    {{-- @if ($item->id==$cliente_id)
                        <option value="{{$item->id}}" selected>{{$item->nome}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                    @endif   --}}
                @endforeach
            </select>
        </div>

        <div class="col">
            <div class="col">Analista</div>
            <select class="form-control" id="cliente" wire:model="analista_id" name="analista" >
                <option></option>
                @foreach ($analistas as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="p-2">{{$xdias}}</div>
    <div class="row">
        <div class="container mt-5 overflow-auto">
            <table class="table table-responsive p-4 border border-5 rounded-2">
                <thead class="table-bordered">
                    <tr class="border-bottom">
                        <th> <span class="ml-4">Nome</span> </th>
                        @foreach ($datas as $dat)
                            <th class="text-center">
    
                                @if (str_contains("Sábado|Domingo",$dat[1]))
                                    <div class="text-center alert-danger">
                                @else
                                    <div class="text-center">
                                @endif                                       
                                    {{ date("d/m/Y", strtotime($dat[0])) }}
                                    <br>
                                    {{$dat[1]}}
                                </div>
                        </th>     
                        @endforeach
                        
                    </tr>
                    </thead>
                    <tbody  class="border border-25 rounded-2">
                        {{-- @foreach ($agendas[0] as $nomes ) --}}
                        @for ($ni = 0; $ni < sizeof($agendas[0]); $ni++)
                            <tr class="border-bottom ">
                                <td scope="row mx-auto  "  style="width: 200px;">
                                    <div class="col text-center p-10">
                                        {{$agendas[0][$ni]['nome']}}
                                        <a href="" data-bs-toggle="modal" data-bs-target="#modalvariasagenda" wire:click="$emit('eventVarios','varios','{{$agendas[0][$ni]['user_id']}}')"><small><i class="far fa-list-alt"></i></small>  </a>
                                    </div>
                                </td>
                                @for ($i = 0; $i < sizeof($agendas); $i++)
                                    <td class="text-center ">
                                        @if (str_contains("Sábado|Domingo",$agendas[$i][$ni]['dia']))
                                            <div class="row position-relative alert-danger">
                                                @else 
                                            @if(empty($agendas[$i][$ni]['cliente_nome']))
                                                <div class="row position-relative alert-secondary">
                                            @else   
                                                <div class="row position-relative alert-warning">
                                            @endif
                                        @endif
                                                <div class="text-center" style="width: 300px;">
                                                @if ($agendas[$i][$ni]['agenda_id']<>'999999')
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalagenda" wire:click="$emit('eventAction','alterar',{{$agendas[$i][$ni]['agenda_id']}},'{{$agendas[$i][$ni]['data']}}',{{$agendas[$i][$ni]['user_id']}},{{$agendas[$i][$ni]['cliente_id']}},'{{$agendas[$i][$ni]['hrini']}}','{{$agendas[$i][$ni]['hrfim']}}','{{$agendas[$i][$ni]['local']}}','{{$agendas[$i][$ni]['projeto_id']}}','{{$agendas[$i][$ni]['fatura']}}')">
                                                @else
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalagenda" wire:click="$emit('eventAction','add',{{$agendas[$i][$ni]['agenda_id']}},'{{$agendas[$i][$ni]['data']}}',{{$agendas[$i][$ni]['user_id']}},{{$agendas[$i][$ni]['cliente_id']}},'{{$agendas[$i][$ni]['hrini']}}','{{$agendas[$i][$ni]['hrfim']}}','{{$agendas[$i][$ni]['local']}}','{{$agendas[$i][$ni]['projeto_id']}}','{{$agendas[$i][$ni]['fatura']}}')">
                                                @endif
                                                    @if ($agendas[$i][$ni]['outros'] >1)
                                                        <div class="bg-success rounded shadow-lg ">
                                                            @if(empty($agendas[$i][$ni]['cliente_nome']))
                                                                <span class="d-block font-weight-bold">{{$agendas[$i][$ni]['obs']}}</span> 
                                                            @else
                                                                {{-- <span class="d-block font-weight-bold text-white">DIVERSOS</span>  --}}
                                                                @for ($ix = 0; $ix < sizeof($agendas[$i][$ni]['clientes']); $ix++)
                                                                    <p><span class="d-block font-weight-bold text-white"><?php echo $agendas[$i][$ni]['clientes'][$ix][0 ]    ;?></span> </p> 
                                                                @endfor
                                                            @endif
                                                            <small><a href="" class="text-white" data-bs-toggle="modal" data-bs-target="#modalLisAgenda" wire:click="$emit('listaAgenda','{{ $agendas[$i][$ni]['data'] }}',{{$agendas[$i][$ni]['user_id']}})"> Listar</a>  <a href="" class="text-white" data-bs-toggle="modal" data-bs-target="#modalLisAgenda" wire:click="$emit('listaAgenda','{{ $agendas[$i][$ni]['data'] }}',{{$agendas[$i][$ni]['user_id']}})"><i class="fas fa-list-ol"></i> </small> 
                                                        </div>        
                                                    @else
                                                        @if(empty($agendas[$i][$ni]['cliente_nome']))
                                                            <span class="d-block font-weight-bold">{{$agendas[$i][$ni]['obs']}}</span> 
                                                        @else
                                                            <span class="d-block font-weight-bold">{{$agendas[$i][$ni]['cliente_nome']}}</span> 
                                                        @endif
                                                        <small>{{$agendas[$i][$ni]['local']}}</small> 
                                                    @endif
                                                    
                                                
                                                    {{-- <span class="d-block font-weight-bold">{{$agendas[$i][$ni]['obs']}}</span> 
                                                    <small class="d-block font-weight-bold">{{$agendas[$i][$ni]['hrini']}}-{{$agendas[$i][$ni]['hrfim']}}</small> --}}
                                                    
                                                </a>                                           
                                            
                                            </div>
                                            <div class="row align-bottom text-end" >
                                                <div class="col text-end">
                                                    {{-- <a href="" data-bs-toggle="modal" data-bs-target="#modalagenda" 
                                                        wire:click="$emit('eventAction','add' ,''           ,'{{$agendas[$i][$ni]['data']}}',{{$agendas[$i][$ni]['user_id']}},''            ,''             ,''            ,''       ,''            ,{{$agendas[$i][$ni]['fatura']}})">
                                                        <small><i class="fas fa-plus-circle"></i></small> 
                                                    </a>
                                                     --}}
                                                     <a href="" data-bs-toggle="modal" data-bs-target="#modalagenda" wire:click="$emit('eventAction','add',{{$agendas[$i][$ni]['agenda_id']}},'{{$agendas[$i][$ni]['data']}}',{{$agendas[$i][$ni]['user_id']}},{{$agendas[$i][$ni]['cliente_id']}},'{{$agendas[$i][$ni]['hrini']}}','{{$agendas[$i][$ni]['hrfim']}}','{{$agendas[$i][$ni]['local']}}','{{$agendas[$i][$ni]['projeto_id']}}','{{$agendas[$i][$ni]['fatura']}}')"><small><i class="fas fa-plus-circle"></i></small>  </a>
                                                </div>
                                                <div class="col text-end">
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteall" wire:click="$emit('eventdel','excluir','Agenda',{{$agendas[$i][$ni]['agenda_id']}})">
                                                        <small><i class="fas fa-trash-alt"></i></small> 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <a href="#">{{$agendas[$i][$ni]['obs']}}</a> --}}
                                    </td>
                                @endfor
                                
                            </tr>            
                        @endfor
                    
                    </tbody>
            </table>
        </div>    
    </div>
</div>

@livewire('movimentos.agenda.modal-agenda')

@livewire('cadastros.modal-delete')

@livewire('movimentos.agenda.lista-agenda')

@livewire('movimentos.agenda.add-varios')