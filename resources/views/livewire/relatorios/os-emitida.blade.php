<div>
    <div class="card">
        <div class="card-header">
            Parâmetros do Relatorio
        </div>
        <div class="card-body">
            <div class="row form-group">
                <label for="descricaopraca">Data De</label>
                <input type="date" class="form-control"   wire:model="dtDe">
            </div>
            <div class="row form-group">
                <label for="descricaopraca">Data Ate</label>
                <input type="date" class="form-control"   wire:model="dtAte">
            </div>
            <div class="row form-group">
                <label for="descricaopraca">Cliente</label>
                <select class="form-control" id="cliente" wire:model="cliente_id" name="cliente">
                    <option value="0">Todos</option>
                    @foreach ($clientes as $item)
                    <option value="{{$item->id}}">{{$item->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row form-group">
                <label for="descricaopraca">Analistas</label>
                <select class="form-control" id="cliente" wire:model="user_id" name="usuario">
                    <option value="0">Todos</option>
                    @foreach ($analistas as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row p-2">    
                <button class="btn btn-primary" wire:click="submit">
                    <i class="fas fa-print"></i> 
                        Imprimir
                </button>
            </div>
        </div>
    </div>
</div>
