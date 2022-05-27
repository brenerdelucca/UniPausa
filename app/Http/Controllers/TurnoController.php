<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function inserirTurno(Request $request)
    {
        Turno::create([
            'nome_turno' => $request->nomeTurno,
            'hr_inicio' => $request->horaInicio,
            'hr_fim' => $request->horaFim,
            'hr_inicio_almoco' => $request->horaInicioAlmoco,
            'hr_fim_almoco' => $request->horaFimAlmoco,
            'limite_hr_pausa_manha' => $request->limiteHrPausaManha,
            'limite_hr_pausa_tarde' => $request->limiteHrPausaTarde,
            'ativo' => $request->ativo
        ]);

        Turno::create($request->all());

    }
}
