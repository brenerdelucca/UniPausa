<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $atendentes = DB::table('users')
        ->join('turnos', 'users.turno_id', "=", 'turnos.id')
        ->select('users.id', 'users.nome_atendente', 'users.sobrenome_atendente', 'users.email', 'users.is_supervisor', 'users.ativo', 'turnos.nome_turno')
        ->get();
        return view('/atendente/homeAtendente', ['atendentes' => $atendentes]);
    }
}
