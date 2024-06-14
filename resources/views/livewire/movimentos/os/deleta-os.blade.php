<div>
    <div>
        <div wire:ignore.self class="modal fade" tabindex="-1" id="deleteos">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Exclusão  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{-- {{ $descricao }} --}}
                  <p>Ordem de serviço nº:{{$diversos_id}}</p>
                  <p>{{$cliente}}</p>
               
                  <p>Deseja mesmo excluir este registro </p>
          
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='delete()'>Sim</button>
                  <button type="button" class="btn btn-primary">Cancelar</button>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
<div>
    <div>
        <div wire:ignore.self class="modal fade" tabindex="-1" id="deleteos">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Exclusão  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{-- {{ $descricao }} --}}
                  <p>Ordem de serviço nº:{{$diversos_id}}</p>
                  <p>Data: {{ $dataos}}</p>
                  <p>{{$cliente}}</p>
                  <p>Deseja mesmo excluir este registro </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='delete()'>Sim</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click='cancela()'>Cancelar</button>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
