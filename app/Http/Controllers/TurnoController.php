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
}
