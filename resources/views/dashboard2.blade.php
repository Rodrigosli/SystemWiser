<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Seja Bem Vindo(a), <span class="text-muted">{{Auth::user()->name}}</span> 
        </h2>
    </x-slot>
    <div class="py-6">
            
        <div class="bg-warning bg-gradient h-12 rounded-lg" style="max-width: 540px;">
        tttt
        </div>
    </div>
    
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-md-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Events</span>
                      <span class="info-box-number">41,410</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                      </div>
                      <span class="progress-description">
                        70% Increase in 30 Days
                      </span>
                    </div>
                  </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
