<div>
    <div>
        <div wire:ignore.self  class="modal fade" id="modalusuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                                Usuários
    
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="card">
                            <div class="card-header">
                            Cadastro de Usuários
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <label for="descricaopraca">Nome</label>
                                    <input type="text" class="form-control" id="nome" aria-describedby="name" wire:model="nome">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">E-Mail</label>
                                    <input type="email" class="form-control"  wire:model="email">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Senha</label>
                                    <input type="password" class="form-control"  wire:model="senha">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Empresa</label>
                                    <select class="form-control" wire:model="empresa_id"> 
                                        <option></option>
                                        @foreach($empresas as $empresa)
                                            @if ($empresa->id==$empresa->id)
                                                <option value="{{$empresa->id}}" selected>{{$empresa->nome}}</option> 
                                            @else
                                            <option value="{{$empresa->id}}" >{{$empresa->nome}}</option>
                                            @endif
                                           
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Tipo Usuário</label>
                                    <select class="form-control" wire:model="tipo_usuarios_id"> 
                                        <option></option>
                                        @foreach($acessos as $acesso)                                          
                                            @if ($tipo_usuarios_id == $acesso->id)
                                                <option value="{{$acesso->id}}" selected>{{$acesso->descricao}}</option>
                                            @else
                                                <option value="{{$acesso->id}}">{{$acesso->descricao}}</option>
                                            @endif
                                                
                                        @endforeach
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
    
    
    <script>
        Livewire.on('modalClose', (modalId) => {
            $(modalId).modal('hide');
        })
    </script>
</div>
