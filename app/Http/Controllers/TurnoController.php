<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TurnoController extends Controller
{
    public function inserirTurno(Request $request)
    {
        Turno::create($request->all());
        return redirect('/homeTurno');
    }

    public function telaTurnos()
    {
        $turnos = Turno::all();
        return view('/turno/homeTurno', ['turnos' => $turnos]);
    }

    public function acharTurno($id)
    {
        $turno = Turno::find($id);
        return view('/turno/alterarTurno', ['turno' => $turno]);
    }

    public function alterarTurno(Request $request, $id)
    {
        $turno = Turno::find($id);
        $turno->update($request->all());
        return redirect('/homeTurno');
    }

    public function consultarTurno($id)
    {
        $turno = Turno::find($id);
        return view('/turno/consultarTurno', ['turno' => $turno]);
    }

    public function deletarTurno(Request $request)
    {
        try{
            $turno = Turno::find($request->id);
            $turno->delete();
            return redirect('/homeTurno');
        } catch (QueryException $exception){
            $turnoAntigo = Turno::find($request->id);
            $turnos = Turno::all();
            return view('/turno/erroDeleteTurno', ['turnos' => $turnos, 'turnoAntigo' => $turnoAntigo]);
        }
    }

    public function trocarTurno(Request $request)
    {
        User::where('turno_id', $request->turnoAntigo)
        ->update(['turno_id' => $request->turnoNovo]);
        
        $turnoDeletar = Turno::find($request->turnoAntigo);
        $turnoDeletar->delete();
        return redirect('/homeTurno');
    }
}
