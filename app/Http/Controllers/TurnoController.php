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
        return view('/turno/homeTurno',['turnos' => $turnos]);
    }

    public function deletarTurno($id)
    {
        Turno::where('id_turno', $id)->delete();
        #$turno = Turno::find($id);
        #$turno->delete();
        return redirect('/homeTurno');
    }
}
