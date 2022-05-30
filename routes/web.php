<?php

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

Route::get('/home', function() {
    return view('home');
});

#Rotas dos atendentes

Route::get('/homeAtendente', function() {
    return view('/atendente/homeAtendente');
});


#Rotas dos turnos

Route::get('/homeTurno', [TurnoController::class, 'telaTurnos']);

Route::get('/cadastrarTurno', function() {
    return view('/turno/cadastrarTurno');
});

Route::post('/inserirTurno', [TurnoController::class, 'inserirTurno']);

Route::get('/alterarTurno/{id}', [TurnoController::class, 'acharTurno']);

Route::post('/alterarTurno/{id}', [TurnoController::class, 'alterarTurno']);

Route::get('/consultarTurno/{id}', [TurnoController::class, 'consultarTurno']);

Route::get('/deletarTurno/{id}', [TurnoController::class, 'deletarTurno']);