                <div class="dropdown p-3">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Cadastros
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">
                            <x-jet-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                                Usuários
                            </x-jet-nav-link>                
                        </a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                            <x-jet-nav-link href="{{ route('empresas') }}" :active="request()->routeIs('empresas')">
                                Empresas
                            </x-jet-nav-link>                
                        </a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                            <x-jet-nav-link href="{{ route('clientes') }}" :active="request()->routeIs('clientes')">
                                Clientes
                            </x-jet-nav-link>                
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                            <x-jet-nav-link href="{{ route('projetos') }}" :active="request()->routeIs('projetos')">
                                Projetos
                            </x-jet-nav-link>                
                            </a>
                        </li>
                        
                      {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                    </ul>
			    </div>
            

				<div class="dropdown p-3">
					<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						Movimentos
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item" href="#">
							<x-jet-nav-link href="{{ route('agenda') }}" :active="request()->routeIs('agenda')">
								<i class="far fa-calendar"></i> 
								<div class="m-2">Agenda Equipe</div>
							</x-jet-nav-link>                
						</a>
						<li><a class="dropdown-item" href="#">
							<x-jet-nav-link href="{{ route('os') }}" :active="request()->routeIs('os')">
								<i class="far fa-calendar"></i> 
								<div class="m-2">Minha Agenda</div>
							</x-jet-nav-link>                
						</a>
						</li>
						<li><a class="dropdown-item" href="#">
							<x-jet-nav-link href="{{ route('conferencia') }}" :active="request()->routeIs('conferencia')">
								<i class="far fa-calendar"></i> 
								<div class="m-2">Ordens de Serviço</div>
							</x-jet-nav-link>                
						</a>
						</li>
					</ul>
				</div>
		
