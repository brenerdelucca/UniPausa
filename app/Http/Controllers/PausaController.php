<?php

namespace App\Http\Controllers;
use App\Models\Registro;
use App\Models\User;
use App\Models\Parametro;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PausaController extends Controller
{
    public function atendentesEmPausa()
    {
        $atendentesEmPausa = DB::table('users')
        ->join('registros', 'registros.user_id', '=', 'users.id')
        ->select('users.id', 'users.nome_atendente', 'users.sobrenome_atendente', 'registros.*')
        ->where('users.esta_em_pausa', true)
        ->where('hr_fim_pausa', null)
        ->get();
        
        return view('home', ['atendentesEmPausa' => $atendentesEmPausa]);
    }

    public function entrarEmPausa()
    {
        $atendentesEmPausa = DB::table('users')
        ->select()
        ->where('esta_em_pausa', true)
        ->get();
        
        $parametrosPausa = DB::table('parametros')
        ->select()
        ->where('id', 1)
        ->get();


        if(count($atendentesEmPausa) < $parametrosPausa[0]->qntd_pessoas_pausa)
        {
            $atendente = User::find(auth()->user()->id);
            $atendente->update([
                'esta_em_pausa' => true
            ]);

            Registro::create([
                'dt_pausa' => date('Y/m/d'),
                'hr_inicio_pausa' => date('H:i'),
                'tempo_estimado_pausa' => $parametrosPausa[0]->tempo_pausa,
                'user_id' => auth()->user()->id
            ]);

            return redirect('/home');
        }
        else
        {
            return redirect('/home')->with('notPausa', 'Limite de atendentes em pausa atingido.');
        }
    }

    public function sairDaPausa()
    {
        $atendente = User::find(auth()->user()->id);
        $atendente->update([
            'esta_em_pausa' => false
        ]);

        DB::table('registros')
        ->where('user_id', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->limit(1)
        ->update(['hr_fim_pausa' => date('H:i')]);

        return redirect('/home');
    }
}