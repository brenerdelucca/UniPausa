<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

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

    public function deletarTurno($id)
    {
        $turno = Turno::find($id);
        $turno->delete();
        return redirect('/homeTurno');
    }
}
