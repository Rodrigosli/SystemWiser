<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
    
    <div class="card">
        <div class="card-header">
          Cadastro de Clientes
        </div>
        <div class="card-body">
            <form action="post" wire:submit.prevent="create">
                
                    <div class="row form-group">
                        <label for="descricaopraca">Nome</label>
                        <input type="text" class="form-control" id="nome" aria-describedby="name" wire:model="nome">
                        <small id="descricaoHelp" class="form-text text-muted">Digite o nome do cliente.</small>
                    </div>

                    <div class="row form-group">
                        <label for="descricaopraca">Razão Social</label>
                        <input type="text" class="form-control" id="razao_social" aria-describedby="razao_social" wire:model="razao_social">
                        <small id="descricaoHelp" class="form-text text-muted">Digite a razão social do cliente.</small>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Cnpj</label>
                                <input type="text" class="form-control" id="cgc" aria-describedby="cgc" wire:model="cgc"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o cnpj ou cpf do cliente.</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">E-Mail</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email" wire:model="email"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o e-mail do cliente.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Telefone</label>
                                <input type="text" class="form-control" id="telefone" aria-describedby="telefone" wire:model="telefone"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o telefone do cliente.</small>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-10">
                            <div class="row form-group">
                                <label for="descricaopraca">Endereço</label>
                                <input type="text" class="form-control" id="endereco" aria-describedby="endereco" wire:model="endereco"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o endereço do cliente.</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Número</label>
                                <input type="text" class="form-control" id="numero" aria-describedby="numero" wire:model="numero"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o cnpj do cliente.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Complemento</label>
                                <input type="text" class="form-control" id="complemento" aria-describedby="complemento" wire:model="complemento"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o complemento do endereço.</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Cidade</label>
                                <input type="text" class="form-control" id="numero" aria-describedby="cidade" wire:model="cidade"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite a cidade do cliente.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Estado</label>
                                <input type="text" class="form-control" id="numero" aria-describedby="estado" wire:model="estado"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o estado do cliente.</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">CEP</label>
                                <input type="text" class="form-control" id="numero" aria-describedby="estado" wire:model="cep"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o CEP do cliente.</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Inscrição Municipal</label>
                                <input type="text" class="form-control" id="inscricao_numicipal" aria-describedby="inscricao_numicipal" wire:model="inscricao_municipal"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o número da inscrição municipal do cliente.</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Inscrição Estadual</label>
                                <input type="text" class="form-control" id="inscricao_estadual" aria-describedby="inscricao_estadual" wire:model="inscricao_estadual"  >
                                <small id="descricaoHelp" class="form-text text-muted">Digite o número da inscrição estadual do cliente.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="descricaopraca">Empresa</label>
                            <select class="form-control" wire:model="empresa_id"> 
                                <option></option>
                                @foreach($empresas as $empresa)
                                    {{-- <option value="{{$empresa->id}}">{{$empresa->nome}}</option> --}}
                                    <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                                @endforeach
                            </select>
                            <small id="descricaoHelp" class="form-text text-muted">Empresa para faturamento</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Valor Hora</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="valor_hora" aria-describedby="valor_hora" wire:model="valor_hora" >
                                </div>
                                <small id="descricaoHelp" class="form-text text-muted">Valor da hora cobrado no cliente</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row form-group">
                                <label for="descricaopraca">Status</label>
                                <select class="form-control" wire:model="status" > 
                                    <option></option>
                                    <option>Ativo</option>
                                    <option>Inativo</option>
                                </select>
                            </div>
                        </div>
                    </div>             
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            
        </div>
    </div>
</main>