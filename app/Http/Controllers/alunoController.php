<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Aluno;
use App\Models\Turma;

class alunoController extends Controller
{

    //Diretor Functions

    public function alunosIndex(Request $request)
    {
        $query = Aluno::with('turma');

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('matricula')) {
            $query->where('matricula', 'like', '%' . $request->matricula . '%');
        }

        if ($request->filled('turma_id')) {
            $query->where('turma_id', $request->turma_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $alunos = $query->orderBy('nome')->get();
        $turmas = Turma::orderBy('nome')->get();

        return view('diretor.alunos.index', compact('alunos', 'turmas'));
    }

    public function create()
    {
        $turmas = Turma::orderBy('nome')->get();
        return view('diretor.alunos.create', compact('turmas'));
    }

    public function detalhe($aluno_id)
    {
        $infos = Aluno::Where('id', $aluno_id)->first();

        //dd($infos);

        $turmaNome = Turma::where('id', $infos->turma_id)->pluck('nome')->toArray();

        $infos->turmas = implode(', ', $turmaNome);
        $infos->data_nascimento = Carbon::parse($infos->data_nascimento)->format('d/m/Y');

        return view('diretor.alunos.ver', compact('infos'));
    }
}
