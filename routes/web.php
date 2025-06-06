<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CondominiosController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\DashboardController;

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.post');*/

Route::get('/', [AuthController::class, 'showLoginForm'])->name('loginnew');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


/*
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware('auth')->name('dashboard');
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

//tarefas
Route::get('/tarefas', function () {
    return view('tarefas.visualizarTarefas');
});

//Prestadores de Serviços
Route::get('/prestadores', function () {
    return view('prestadoresServico.visualizarPrestadores');
});

Route::prefix('/clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.visualizarClientes');
    Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/{usuario}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/{usuario}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/{usuario}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});

Route::prefix('/condominios')->group(function () {
    Route::get('/', [CondominiosController::class, 'index'])->name('condominios.visualizarCondominios');
    Route::get('/create', [CondominiosController::class, 'create'])->name('condominios.create');
    Route::post('/', [CondominiosController::class, 'store'])->name('condominios.store');
    Route::get('/{condominio}/edit', [CondominiosController::class, 'edit'])->name('condominios.edit');
    Route::put('/{condominio}', [CondominiosController::class, 'update'])->name('condominios.update');
    Route::delete('/{condominio}', [CondominiosController::class, 'destroy'])->name('condominios.destroy');
});

Route::prefix('/tarefas')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('tarefas.visualizarTarefas');
    Route::get('/create', [TarefaController::class, 'create'])->name('tarefas.create');
    Route::post('/', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::get('/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
    Route::put('/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');
    Route::delete('/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
});

Route::prefix('/prestadores')->group(function () {
    Route::get('/', [PrestadorController::class, 'index'])->name('prestadoresServico.visualizarPrestadores');
    Route::get('/create', [PrestadorController::class, 'create'])->name('prestadores.create');
    Route::post('/', [PrestadorController::class, 'store'])->name('prestadores.store');
    Route::get('/{prestador}/edit', [PrestadorController::class, 'edit'])->name('prestadores.edit');
    Route::put('/{prestador}', [PrestadorController::class, 'update'])->name('prestadores.update');
    Route::delete('/{prestador}', [PrestadorController::class, 'destroy'])->name('prestadores.destroy');
});