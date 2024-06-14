<div>
   
    <div class="row bg-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight  p-4">
           Seja Bem Vindo(a), <span class="text-muted">{{Auth::user()->name}}</span> 
        </h2>
        
        <div  class="row">
            <div class="col-4 bg-warning w-6 p-4 border rounded-lg shadow-lg text-white">
                <div class="row">
                    <div class="col-2">
                        <span class="info-box-icon"><i class="far fa-calendar-alt fa-4x" ></i></span>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <span class="info-box-text">Número de Horas Agendadas</span>
                            <span class="info-box-number">160 Horas</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                70% das horas úteis agendadas.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 bg-success w-6 p-4 border rounded-lg shadow-lg text-white">
                <div class="row">
                    <div class="col-2">
                        <span class="info-box-icon"><i class="far fa-thumbs-up fa-4x" ></i></span>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <span class="info-box-text">Número de Horas Lançadas</span>
                            <span class="info-box-number">92 Horas</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                80% das horas agendadas
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 bg-danger w-6 p-6 border rounded-lg shadow-lg text-white">
                <div class="row">
                    <div class="col-2">
                        <span class="info-box-icon"><i class="far fa-flag fa-4x" ></i></span>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <span class="info-box-text">Quantidade de Pendências</span>
                            <span class="info-box-number">7</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                Pendencias em aberto 
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row py-4">

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <i class="far fa-clipboard"></i> Atividades do Dia
                            </div>
                            <div class="col-4">
                                <div class="row form-group">
                                    <div class="col-3">
                                        <label for="descricaopraca">Cliente: </label> 
                                    </div>
                                    <div class="col-9">
                                        <select class="form-control" id="projeto" wire:model="cliente_id" >
                                            <option></option>
                                            @foreach ($clientes as $item)
                                                @if ($item->id==$cliente_id)
                                                    <option value="{{$item->id}}" selected>{{$item->nome}}</option>   
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nome}}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>
                                        @error('cliente_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($pendencias as $item)
                            <div class="row">
                                <div class="col-1">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        @if ($item->status=='9')
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" checked>
                                            <label class="form-check-label" for="flexCheckIndeterminate">  
                                                <del> {{$item->descricao}}</del> <span class="badge bg-success">Finalizado</span>
                                            </label>        
                                        @else
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{$item->id}}" aria-expanded="false" aria-controls="collapseWidthExample">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                {{$item->descricao}} <span class="badge bg-warning">Pendente</span>
                                            </label>
                                                <div class="collapse collapse-horizontal" id="collapseWidthExample{{$item->id}}">
                                                    <textarea class="form-control"  wire:model.defer="execucao"> </textarea> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <select name="" id="" class="form-control" >
                                                                <option value="0">Pendente</option>
                                                                <option value="1">Em Andamento</option>
                                                                <option value="9">Finalizado</option>
                                                            </select> 
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-primary" wire:click="salva_exec({{$item->id}})">Salvar</button>     
                                                        </div>
                                                    </div>                                         
                                                </div>
                                         
                                               
                                        @endif  
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                  </div>

            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Ordem de Serviço
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="descricaopraca">Descrição</label>
                            {{-- <input type="text" class="form-control"  wire:model="descricao" > --}}
                            <textarea class="form-control"  wire:model="descricao"> </textarea>
                            @error('descricao') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                    </div>
                  </div>

            </div>

            {{-- <div class="row form-group">
                <label for="descricaopraca">Cliente</label>
                <select class="form-control" id="cliente" wire:model="agenda_id" name="cliente">
                    <option></option>
                    @foreach ($agendas as $item)
                        <option value="{{$item->id}}">{{$item->cliente}}</option>
                    @endforeach
                </select>
            </div> --}}
        </div>
    </div>

</div>

