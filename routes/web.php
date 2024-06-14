<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PdfController,
    EnviaOsController
};
use App\Http\Livewire\Cadastros\{
    ShowEmpresa,
    CreateEmpresa,
    AlterEmpresa,
    DeleteEmpresa    
};
use App\Http\Livewire\DashboardAnalista;
use App\Http\Livewire\Cadastros\Cliente\{
    CreateCliente,
    AlterCliente,
    ShowCliente
};

use App\Http\Livewire\Cadastros\Pendencias\{
    ShowPendencias,
};

use App\Models\Movimentos\Agenda;

use App\Http\Livewire\Cadastros\Usuarios\{
    ShowUsuario
};
use App\Http\Livewire\Cadastros\{
    Projeto\ShowProjetos
};

use App\Http\Livewire\Movimentos\{
    Agenda\MainAgenda,
    Conferencia\Conferencia,
};

use App\Http\Livewire\Relatorios\OsEmitida;

use App\Http\Livewire\Movimentos\Os\ShowOs;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/harpia', function () {
    return view('emconstrucao');
});

Route::get('/', function () {
    return view('welcome');
});

//cadastros
Route::get('/empresas/create',CreateEmpresa::class);
Route::get('/empresas/alterar/{id}',AlterEmpresa::class);
Route::get('/empresas/create/{id}',DeleteEmpresa::class);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', DashboardAnalista::class)->name('DashboardAnalista');

Route::middleware(['auth:sanctum', 'verified'])->get('/empresas', ShowEmpresa::class)->name('empresas');
Route::middleware(['auth:sanctum', 'verified'])->get('/clientes', ShowCliente::class)->name('clientes');
Route::middleware(['auth:sanctum', 'verified'])->get('/clientes/create', CreateCliente::class)->name('criar-clientes');
Route::middleware(['auth:sanctum', 'verified'])->get('/clientes/alterar/{id}', AlterCliente::class)->name('alterar-clientes');
Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', ShowUsuario::class)->name('usuarios');
Route::middleware(['auth:sanctum', 'verified'])->get('/agenda', MainAgenda::class)->name('agenda');
Route::middleware(['auth:sanctum', 'verified'])->get('/os', ShowOs::class)->name('os');
Route::middleware(['auth:sanctum', 'verified'])->get('/os/alterar/{id}', AlterCliente::class)->name('alterar-os');
Route::middleware(['auth:sanctum', 'verified'])->get('/projetos', ShowProjetos::class)->name('projetos');
Route::middleware(['auth:sanctum', 'verified'])->get('/conferencia', Conferencia::class)->name('conferencia');
Route::middleware(['auth:sanctum', 'verified'])->get('/RelOss', OsEmitida::class)->name('RelOss');
Route::middleware(['auth:sanctum', 'verified'])->get('/pendencias', ShowPendencias::class)->name('Pendencias');


Route::get('/mail', function () {
    
    Mail::Send('emails.teste',['Teste'=>'email teste'],function($m){
       $m->from('sistemas@harpiaconsultoria.com','Sistemas');
       $m->to('rodrigo@harpiaconsultoria.com');
    });
});

Route::get('pdf', [PdfController::class,'geraPdf']);

// Route::get('/impos/{id}', function ($id) {
//     return view('emails.teste');
// });

Route::get('/impos/{id}', [EnviaOsController::class,'imprimir']);