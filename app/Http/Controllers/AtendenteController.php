<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Turno;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AtendenteController extends Controller
{

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'E-mail é obrigatório.',
            'password.required' => 'Senha é obrigatória.',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $request->session()->regenerate();
            return redirect('home');
        }

        return redirect()->back()->with('danger', 'E-mail ou senha inválida.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    public function cadastrarAtendente()
    {
        $turnos = Turno::all();
        return view('/atendente/cadastrarAtendente', ['turnos' => $turnos]);
    }

    public function inserirAtendente(Request $request)
    {
        try {
            $request->merge([
                'password' =>Hash::make($request->password)
            ]);
            User::create($request->all());
            return redirect('/homeAtendente');
        } catch(QueryException $exception){
            $turnos = Turno::all();
            return view('/atendente/erroCadastrarAtendente', ['dadosCadastro' => $request, 'turnos' => $turnos, 'dadosAlteracao' => $request]);
        }
    }

    public function telaAtendentes()
    {
        $atendentes = DB::table('users')
        ->join('turnos', 'users.turno_id', "=", 'turnos.id')
        ->select('users.id', 'users.nome_atendente', 'users.sobrenome_atendente', 'users.email', 'users.is_supervisor', 'users.ddd', 'users.numero_celular', 'users.ativo', 'turnos.nome_turno')
        ->where('is_adm', '=', false)
        ->orderBy('id')
        ->get();
        return view('/atendente/homeAtendente', ['atendentes' => $atendentes]);
    }

    public function acharAtendente($id)
    {
        $atendente = DB::table('users')
        ->join('turnos', 'users.turno_id', "=", 'turnos.id')
        ->select('users.id', 'users.nome_atendente', 'users.sobrenome_atendente', 'users.email', 'users.is_supervisor', 'users.ddd', 'users.numero_celular', 'users.ativo', 'users.turno_id', 'turnos.nome_turno')
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
            try{
                $request->merge([
                    'password' => Hash::make($request->password)
                ]);
                $atendente->update($request->all());
                return redirect('/homeAtendente');
            } catch(QueryException $exception){
                $turnos = Turno::all();
                return view('/atendente/erroAlterarAtendente', ['dadosAlteracao' => $request, 'turnos' => $turnos, 'id' => $id, 'antigo' => $atendente]);
            }
        }
        else
        {
            try{
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
                return redirect('/homeAtendente');
            } catch(QueryException $exception){
                $turnos = Turno::all();
                return view('/atendente/erroAlterarAtendente', ['dadosAlteracao' => $request, 'turnos' => $turnos, 'id' => $id, 'antigo' => $atendente]);
            }
        }
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

    public function deletarAtendente(Request $request)
    {
        $atendente = User::find($request->id);
        $atendente->delete();
        return redirect('/homeAtendente');
    }

    public function telaAlterarSenha()
    {
        return view('/atendente/alterarSenha');
    }

    public function alterarSenha(Request $request)
    {
        if(Hash::check($request->senhaAntiga, auth()->user()->password))
        {
            if($request->senhaNova == $request->confirmaSenhaNova)
            {
                $atendente = User::find(auth()->user()->id);

                $atendente->update([
                    'password' => Hash::make($request->novaSenha)
                ]);
                
                //reautenticar aqui
            }
            else
            {
                return redirect()->back()->with('dangerNew', 'Confirmação da nova senha não bate.');
            }
        }
        else
        {
            return redirect()->back()->with('dangerOld', 'Senha antiga incorreta.');
        }
        
        return redirect()->back()->with('success', 'Senha alterada com sucesso!');

    }
}
