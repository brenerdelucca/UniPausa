<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;

class AtendenteController extends Controller
{
    public function encontrarTurnoCadastroAtendente()
    {
        $turnos = Turno::all();
        return view('/atendente/cadastrarAtendente', ['turnos' => $turnos]);
    }

    public function inserirAtendente(Request $request)
    {
        User::create($request->all());
        return redirect('/homeAtendente');
    }

    public function telaAtendentes()
    {
        return view('/atendente/homeAtendente');
    }
}
