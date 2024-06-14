<div>
    <div wire:ignore.self class="modal fade" tabindex="-1" id="modaldelete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Exclusão de Cliente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <h2>{{$nome}}</h2>
              <p>Deseja mesmo excluir este cliente?</p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='delete()'>Sim</button>
              <button type="button" class="btn btn-primary">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
</div>
