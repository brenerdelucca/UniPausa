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
        if($request->hr_inicio < $request->hr_fim 
        && $request->hr_inicio_almoco < $request->hr_fim_almoco 
        && $request->hr_inicio_almoco > $request->hr_inicio 
        && $request->hr_inicio_almoco < $request->hr_fim
        && $request->hr_fim_almoco > $request->hr_inicio
        && $request->hr_fim_almoco < $request->hr_fim
        && $request->limite_hr_pausa_manha > $request->hr_inicio
        && $request->limite_hr_pausa_manha < $request->hr_inicio_almoco
        && $request->limite_hr_pausa_tarde > $request->hr_fim_almoco
        && $request->limite_hr_pausa_tarde < $request->hr_fim)
        {
            Turno::create($request->all());
            return redirect('/homeTurno');   
        }

        return redirect()->back()->with('erroHora', 'Inconsistência nos horários.');
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
        if($request->hr_inicio < $request->hr_fim 
        && $request->hr_inicio_almoco < $request->hr_fim_almoco 
        && $request->hr_inicio_almoco > $request->hr_inicio 
        && $request->hr_inicio_almoco < $request->hr_fim
        && $request->hr_fim_almoco > $request->hr_inicio
        && $request->hr_fim_almoco < $request->hr_fim
        && $request->limite_hr_pausa_manha > $request->hr_inicio
        && $request->limite_hr_pausa_manha < $request->hr_inicio_almoco
        && $request->limite_hr_pausa_tarde > $request->hr_fim_almoco
        && $request->limite_hr_pausa_tarde < $request->hr_fim)
        {
            $turno = Turno::find($id);
            $turno->update($request->all());
            return redirect('/homeTurno');   
        }

        return redirect()->action([TurnoController::class, 'acharTurno'], ['id' => $id])->with('erroHora', 'Inconsistência nos horários.');
    }

    public function consultarTurno($id)
    {
        $turno = Turno::find($id);
        return view('/turno/consultarTurno', ['turno' => $turno]);
    }

    public function deletarTurno(Request $request)
    {
        $turnosCadastrados = Turno::all();

        if(count($turnosCadastrados) == 1)
        {
            return redirect('/homeTurno')->with('warning', 'Não é possível excluir este turno pois ele é o único cadastrado.');
        }

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
