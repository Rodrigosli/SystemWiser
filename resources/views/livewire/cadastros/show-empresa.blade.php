

<div>
      
        {{-- If your happiness depends on money, you will never be happy with yourself. --}}
        <h2>Cadastro de Empresas</h2>
        <p>{{$message}}</p>
        <p>{{$nome1}}</p>
        <a href="/empresas/create" class="btn btn-primary">Incluir</a> <hr/>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">CNPJ</th>
                  <th scope="col">Endereco</th>
                  <th scope="col">Número</th>
                  <th scope="col">Complemento</th>
                  {{-- <th scope="col">Cidade</th> --}}
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($empresas as $empresa)
      
                    <tr>
                        <th scope="row">{{$empresa->id}}</th>
                        <td>{{$empresa->nome}}</td>
                        <td>{{$empresa->cnpj}}</td>
                        <td>{{$empresa->endereco}}</td>
                        <td>{{$empresa->numero}}</td>
                        <td>{{$empresa->complemento}}</td>
                        {{-- <td>{{$empresa->cidade}}</td> --}}
                        <td>
                      
                            {{-- <a href="empresas/alterar/{{$empresa->id}}" >Alterar</a> --}}
                            <a href="#" wire:click="alterar({{$empresa}})" >Alterar</a> 
                                {{-- @livewire('cadastros.alter-empresa', ['empresa' => $empresa], key($empresa->id)) --}}
                            <a href="#" wire:click.prevent="delete({{$empresa->id }})" >Excluir</a>
          
                        </td>
                    </tr>
                @endforeach

              </tbody>
              
        </table>


            
    </div>
    
</div>
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form wire:submit.prevent="create" method="post">
                    <div class="row">
                                
                        <div class="col-12">
                            <label for="staticEmail" class="col-2 col-form-label">Nome</label>
                            <input type="text" class="form-control"  placeholder="Nome da empresa" value="{{$nome1}}" wire:model="nome">
                            @error('nome')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                        <div class="col-6">
                            <label for="staticEmail" class="col-2 col-form-label">Cnpj</label>
                            <input type="text" class="form-control"  placeholder="CNPJ da empresa" wire:model="cnpj">
                            @error('cnpj')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                        <div class="col-6">
                            <label for="staticEmail" class="col-6 col-form-label">Insc. Municipal</label>
                            <input type="text" class="form-control"  placeholder="Inscrição Municipal da empresa" wire:model="inscricao_numicipal">
                            @error('inscricao_numicipal')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                        <div class="col-6">
                            <label for="staticEmail" class="col-6 col-form-label">Ins. Estadual</label>
                            <input type="text" class="form-control"  placeholder="Inscrição Estadual da empresa" wire:model="inscricao_estadual">
                            @error('inscricao_estadual')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                        <div class="col-10">
                            <label for="staticEmail" class="col-6 col-form-label">Endereço</label>
                            <input type="text" class="form-control"  placeholder="Endereço da empresa" wire:model="endereco">
                            @error('endereco')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                        <div class="col-2">
                            <label for="staticEmail" class="col-6 col-form-label">Número</label>
                            <input type="text" class="form-control"  placeholder="Número Endereço" wire:model="numero">
                            @error('numero')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="staticEmail" class="col-6 col-form-label">Complemento</label>
                            <input type="text" class="form-control"  placeholder="Complemento Endereço" wire:model="complemento">
                            @error('complemento')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                     
                        <div class="col-6">
                            <label for="staticEmail" class="col-6 col-form-label" >CEP</label>
                            <input type="text" class="form-control"  placeholder="CEP Endereço" wire:model="cep">
                            @error('cep')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                        <div class="col-6">
                            <label for="staticEmail" class="col-6 col-form-label">Cidade</label>
                            <input type="text" class="form-control"  placeholder="Cidade" wire:model="cidade">
                            @error('cidade')
                                <small id="descricaoHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div> 
                        <div class="row pt-2"> 
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                        
                                   
                        
                    </div>
                </form>
              </div>
              
            </div>
          </div>
    </div>
</div>
