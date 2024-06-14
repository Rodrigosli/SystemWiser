<div>

    <div wire:ignore.self  class="modal fade" id="incluipendencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                            Incluir
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="card">
                        <div class="card-header">
                        Nova Pendencia
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="descricaopraca">Cliente</label>
                                <select class="form-control" id="cliente" wire:model="cliente_id" name="cliente">
                                    <option></option>
                                    @foreach ($clientes as $item)
                                        <option value="{{$item->id}}">{{$item->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row form-group">
                                <label for="descricaopraca">Analista Responsável</label>
                                <select class="form-control" id="cliente" wire:model="analista_id" name="cliente">
                                    <option></option>
                                    @foreach ($analistas as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row form-group">
                                <label for="descricaopraca">Descrição</label>
                                <input type="text" class="form-control" id="nome" aria-describedby="name" wire:model="descricao">
                                <small id="descricaoHelp" class="form-text text-muted">Digite a descrição da pendência.</small>
                            </div>
                            
                            <button class="btn btn-primary" wire:click="submit"><i class="fas fa-cloud-upload-alt"></i> Salvar</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
    Livewire.on('modalClose', (modalId) => {
        $(modalId).modal('hide');
    })
</script>