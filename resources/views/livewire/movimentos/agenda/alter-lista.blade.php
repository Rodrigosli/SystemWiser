<div>
    <div wire:ignore.self  class="modal fade" id="altelist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        Agenda do 
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="descricaopraca">Descrição</label>
                                <input type="text" class="form-control"  wire:model="descricao">
                            </div>
                            <div class="row form-group">
                                <label for="descricaopraca">Data</label>
                                <input type="date" class="form-control"   wire:model="dtagenda" disabled>
                            </div>
                            <div class="row form-group">
                                <label for="descricaopraca">Cliente</label>
                                <select class="form-control" id="cliente" wire:model="cliente_id" name="cliente"  wire:click="change($event.target.value)">
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
                            <div class="row form-group">
                                <label for="descricaopraca">Projeto</label>
                                <select class="form-control" id="projeto" wire:model="projeto_id">
                                    <option></option>
                                    @foreach ($projetos as $item)
                                        <option value="{{$item->id}}">{{$item->descricao}}</option>
                                        {{-- @if ($item->id==$projeto_id)
                                            <option value="{{$item->id}}" selected>{{$item->descricao}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->descricao}}</option>
                                        @endif   --}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="row form-group">
                                <label for="descricaopraca">Usuário</label>
                                <select class="form-control" disabled>
                                    <option></option>
                                    @foreach ($usuarios as $item)
                                    <option values="{{$item->id}}">{{$item->name}}</option>
                                        @if ($item->id==$user_id)
                                            <option values="{{$item->id}}" selected>{{$item->name}}</option>
                                        @else
                                            <option values="{{$item->id}}">{{$item->name}}</option>
                                        @endif  
                                    @endforeach
                                </select>
                            </div>
                            <div class="row form-group">
                                <label for="descricaopraca">Hora Início</label>
                                <input type="text" class="form-control"   wire:model="hora_inicio">
                            </div>
                        
                            <div class="row form-group">
                                <label for="descricaopraca">Hora Fim</label>
                                <input type="text" class="form-control"   wire:model="hora_fim">
                            </div>
                            <div class="row form-group">
                                <label for="descricaopraca">Atendimento</label>
                                <select class="form-control" wire:model="local">
                                    <option></option>
                                    <option values="Remoto">Remoto</option>
                                    <option values="Presencial">Presencial</option>
                                    {{-- @if (trim($local)=="Presencial")
                                            <option values="Presencial" selected> Presencial</option>
                                    @else
                                        <option values="Presencial">Presencial</option>
                                    @endif
                                    @if (trim($local)=="Remoto")
                                        <option values="Remoto" selected >Remoto</option>
                                    @else
                                        <option values="Remoto">Remoto</option>
                                    @endif --}}
                                </select>
                            </div>
                            
                            <div class="row p-2">    
                                <button class="btn btn-primary" wire:click="submit">
                                    <i class="fas fa-cloud-upload-alt"></i> 
                                        Salvar
                                </button>
                            </div>
                            {{-- </form> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

    
