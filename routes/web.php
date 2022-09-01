<?php

use App\Http\Controllers\AtendenteController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::post('/auth', [AtendenteController::class, 'auth']);

Route::middleware(['atendente'])->group(function(){
    Route::get('/home', function() {
        return view('home');
    });
    
    Route::get('/logout', [AtendenteController::class, 'logout']);
});

Route::middleware(['supervisor'])->group(function(){
    #Controle de Users

    Route::get('/homeAtendente', [AtendenteController::class, 'telaAtendentes']);

    Route::get('/cadastrarAtendente', [AtendenteController::class, 'cadastrarAtendente']);

    Route::post('/inserirAtendente', [AtendenteController::class, 'inserirAtendente']);

    Route::get('/alterarAtendente/{id}', [AtendenteController::class, 'acharAtendente']);

    Route::post('/alterarAtendente/{id}', [AtendenteController::class, 'alterarAtendente']);

    Route::get('/consultarAtendente/{id}', [AtendenteController::class, 'consultarAtendente']);

    Route::post('/deletarAtendente', [AtendenteController::class, 'deletarAtendente']);

    #Controle de turnos

    Route::get('/homeTurno', [TurnoController::class, 'telaTurnos']);

    Route::get('/cadastrarTurno', function() {
        return view('/turno/cadastrarTurno');
    });

    Route::post('/inserirTurno', [TurnoController::class, 'inserirTurno']);

    Route::get('/alterarTurno/{id}', [TurnoController::class, 'acharTurno']);

    Route::post('/alterarTurno/{id}', [TurnoController::class, 'alterarTurno']);

    Route::get('/consultarTurno/{id}', [TurnoController::class, 'consultarTurno']);

    Route::post('/deletarTurno', [TurnoController::class, 'deletarTurno']);

    Route::post('/trocarTurno', [TurnoController::class, 'trocarTurno']);
});

Route::middleware(['adm'])->group(function(){
    #Gerenciamento dos parâmetros

    Route::get('/parametros', [ParametrosController::class, 'telaParametros']);

    Route::post('/alterarParametros', [ParametrosController::class, 'alterarParametros']);
});