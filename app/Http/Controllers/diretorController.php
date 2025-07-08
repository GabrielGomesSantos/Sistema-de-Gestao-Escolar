<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Usuario;

class diretorController extends Controller
{
    public function funcionarioIndex()
    {
        $funcionarios = Usuario::where('funcao', '!=', 'diretor')->get();

        $turma = Turma::all();

        foreach ($funcionarios as $funcionario) {
            // Busca todas as turmas onde esse professor está vinculado
            $turmasDoProfessor = Turma::where('professor_id', $funcionario->id)->pluck('nome')->toArray();

            // Junta os nomes das turmas numa string e adiciona no atributo 'setor' (ou outro nome melhor, como 'turmas')
            $funcionario->turmas = implode(', ', $turmasDoProfessor);
        }

        
        //dd($funcionarios);

        return view('diretor.funcionarios', compact('funcionarios'));
    }

    public function selecionarTurma(Request $request)
    {
        $anoSelecionado = $request->input('ano');

        // Pega os anos distintos para popular o filtro
        $anos = Turma::select('ano_letivo')->distinct()->orderBy('ano_letivo', 'desc')->pluck('ano_letivo');

        // Busca as turmas filtrando pelo ano, se houver ano selecionado
        $query = Turma::query();

        if ($anoSelecionado) {
            $query->where('ano_letivo', $anoSelecionado);
        }

        $turmas = $query->orderBy('nome')->get();

        return view('diretor.boletim.turma', compact('turmas', 'anos', 'anoSelecionado'));
    }

    public function listarAlunosParaBoletim(Request $request)
    {
        $query = Aluno::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('matricula')) {
            $query->where('matricula', $request->matricula);
        }

        if ($request->filled('turma_id')) {
            $query->where('turma_id', $request->turma_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $alunos = $query->with('turma')->get();

        $turmas = Turma::orderBy('nome')->get();

        return view('diretor.boletim.aluno', compact('alunos', 'turmas'));
    }

    public function imprimirPorAluno(Request $request)
    {
        $aluno = Aluno::with('turma')->findOrFail($request->aluno_id);

        // Aqui gera o PDF ou mostra o boletim
        return view('boletins.visualizar_aluno', compact('aluno'));
    }
}
