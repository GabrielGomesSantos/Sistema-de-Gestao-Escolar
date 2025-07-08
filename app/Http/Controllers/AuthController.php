<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Turma;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // onde está o seu formulário
    }

    public function login(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('cpf', $request->cpf)->where('ativo', true)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->senha)) {
            return back()->withErrors(['cpf' => 'CPF ou senha inválidos']);
        }

        Auth::login($usuario);

        //dd(Auth::user()->funcao);

        if (Auth::user()->funcao === 'professor' && Auth::user()->turmas->isNotEmpty()) {
            $turmaId = Auth::user()->turmas->first()->id;
            session(['turma_id' => $turmaId]);
        }

        // Redireciona para o painel correto
        return redirect('/painel/' . Auth::user()->funcao);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida a sessão atual
        $request->session()->invalidate();

        // Regenera o token CSRF para segurança
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Você saiu com sucesso.');
    }
}
