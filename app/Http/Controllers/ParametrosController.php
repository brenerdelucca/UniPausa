<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parametro;

class ParametrosController extends Controller
{
    public function telaParametros(){
        $parametros = Parametro::find(1);
        return view('/parametros/parametros', ['parametros' => $parametros]);
    }

    public function alterarParametros(Request $request){
        $parametros = Parametro::find(1);
        $parametros->update($request->all());
        return redirect()->back()->with('success', 'Parâmetros alterados com sucesso!');
    }
}
