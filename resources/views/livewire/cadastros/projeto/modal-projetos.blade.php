<div>
    <div wire:ignore.self  class="modal fade" id="modalprojetos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
       
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="card">
                        <div class="card-header">
                        Cadastro de Projetos
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="descricaopraca">Descrição</label>
                                <input type="text" class="form-control"  wire:model="descricao">
                            </div>
                            <div class="col">
                                <div class="row form-group">
                                    <label for="descricaopraca">Cliente</label>
                                    <select class="form-control" wire:model="cliente_id" > 
                                        <option></option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row form-group">
                                    <label for="descricaopraca">Status</label>
                                    <select class="form-control" wire:model="status" > 
                                        <option></option>
                                        @if ($status=='Ativo')
                                            <option selected>Ativo</option>
                                        @else
                                            <option>Ativo</option>
                                        @endif
                                        @if ($status=='Inativo')
                                            <option selected>Inativo</option>
                                        @else
                                            <option>Inativo</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="pt-2"></div>
                            <button class="btn btn-primary" wire:click="submit">
                                <i class="fas fa-cloud-upload-alt"></i> Salvar
                            </button>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
