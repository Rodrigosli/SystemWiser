

<main class="col-12">
    {{$emp}}
    <form wire:submit.prevent="create" method="post">
        <div class="row">
                    
            <div class="col-12">
                <label for="staticEmail" class="col-2 col-form-label">Nome</label>
                <input type="text" class="form-control"  placeholder="Nome da empresa" wire:model="nome">
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
            
            <div class="row ">
                <div class="col-6 p-4">
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>  
                </div>
            </div>
        </div>
    </form>
</div>