<div>
    <div>
        <div wire:ignore.self  class="modal fade" id="modalaltOs" tabindex="-1" aria-labelledby="modalOsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                                Agenda
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="card">
                            <div class="card-header">
                            Agenda dia {{ date("d/m/Y", strtotime($dtagenda))}}
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <label for="descricaopraca">Descrição</label>
                                    <input type="text" class="form-control"  wire:model="descricao" >
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Cliente</label>
                                    <select class="form-control" id="projeto" wire:model="cliente_id" >
                                        <option></option>
                                        @foreach ($clientes as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Projeto</label>
                                    <select class="form-control" id="projeto" wire:model="projeto_id" >
                                        <option></option>
                                        @foreach ($projetos as $item)
                                            <option value="{{$item->id}}">{{$item->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Faturamento</label>
                                    <select class="form-control" id="projeto" wire:model="fatura" >
                                        <option></option>
                                        <option value="FATURADA">FATURADA</option>
                                        <option value="INVESTIMENTO CLIENTE ">INVESTIMENTO CLIENTE</option>
                                        <option value="PROJETO FECHADO">PROJETO FECHADO</option>
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Faturar Para</label>
                                    <select class="form-control" wire:model="empresa">
                                        <option></option>
                                        <option value="ERP">ERP</option>
                                        <option value="WEB">WEB</option>
                                    </select>
                                    @error('fatura') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Hora Inicio</label>
                                    <input type="time" class="form-control"  wire:model="hora_inicio">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Hora Almoço/Pausa</label>
                                    <input type="time" class="form-control"  wire:model="hora_pausa">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Hora Fim</label>
                                    <input type="time" class="form-control"  wire:model="hora_fim">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Hora traslado</label>
                                    <input type="time" class="form-control"  wire:model="hora_traslado">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Execução</label>
                                    <textarea class="form-control"  wire:model="execucao"> </textarea>
                                </div>
                                <div class="row p-2">    
                                    <button class="btn btn-primary" wire:click="submit" wire:loading.attr="disabled">
                                        <i class="fas fa-cloud-upload-alt"></i> 
                                            Salvar
                                    </button>
                                </div>
                                
                                <div wire:loading wire:target="quantity">
                                    Updating quantity...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>
   
   
</div>
