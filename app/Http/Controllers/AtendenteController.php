<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtendenteController extends Controller
{
    public function cadastrarAtendente()
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

    public function acharAtendente($id)
    {
        $atendente = DB::table('users')
        ->join('turnos', 'users.turno_id', "=", 'turnos.id')
        ->select('users.id', 'users.nome_atendente', 'users.sobrenome_atendente', 'users.email', 'users.is_supervisor', 'users.ativo', 'users.turno_id', 'turnos.nome_turno')
        ->where('users.id', $id)
        ->get();
        $atendente = $atendente[0];
        $turnos = Turno::all();
        return view('/atendente/alterarAtendente', ['atendente' => $atendente, 'turnos' => $turnos]);
    }

    public function alterarAtendente(Request $request, $id)
    {
        $atendente = User::find($id);
        if(isset($request->password))
        {
            $atendente->update($request->all()); 
        }
        else
        {
            $atendente->update([
                'nome_atendente' => $request->nome_atendente,
                'sobrenome_atendente' => $request->sobrenome_atendente,
                'email' => $request->email,
                'ddd' => $request->ddd,
                'numero_celular' => $request->numero_celular,
                'is_supervisor' => $request->is_supervisor,
                'ativo' => $request->ativo,
                'turno_id' => $request->turno_id
            ]); 
        }
               
        return redirect('/homeAtendente');
    }

    public function consultarAtendente($id)
    {
        $atendente = DB::table('users')
        ->join('turnos', 'users.turno_id', "=", 'turnos.id')
        ->select('users.id', 'users.nome_atendente', 'users.sobrenome_atendente', 'users.email', 'users.is_supervisor', 'users.ativo', 'users.turno_id', 'turnos.nome_turno')
        ->where('users.id', $id)
        ->get();
        $atendente = $atendente[0];
        $turnos = Turno::all();
        return view('/atendente/consultarAtendente', ['atendente' => $atendente, 'turnos' => $turnos]);
    }
}
