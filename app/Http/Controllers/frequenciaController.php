<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Frequencia;
use Carbon\Carbon;

class frequenciaController extends Controller
{
    public function create(Request $request)
    {
        $turma_id = session('turma_id');
        $turma = Turma::findOrFail($turma_id);

        $data = $request->query('data') ?? Carbon::today()->toDateString();

        $alunos = Aluno::where('turma_id', $turma_id)->orderBy('nome')->get();

        // Carregar as frequências já registradas para essa data e turma
        $frequencias = Frequencia::where('turma_id', $turma_id)
                                ->where('data', $data)
                                ->get()
                                ->pluck('status', 'aluno_id')
                                ->toArray();

        // Verifica se a chamada já foi confirmada
        $confirmada = Frequencia::where('turma_id', $turma_id)
                                ->where('data', $data)
                                ->where('confirmada', true)  // assumindo que tem campo confirmada boolean
                                ->exists();

        return view('professores.frequencia', compact('turma', 'alunos', 'data', 'frequencias', 'confirmada'));
    }

    public function store(Request $request, $turma_id)
    {
        $data = $request->input('data', now()->toDateString());

        // Checa se já existe chamada confirmada para essa turma/data
        $confirmada = Frequencia::where('turma_id', $turma_id)
                                ->where('data', $data)
                                ->where('confirmada', true)
                                ->exists();

        if ($confirmada) {
            return redirect()->back()->withErrors(['msg' => 'Chamada já foi confirmada e não pode ser alterada.']);
        }

        $frequencias = $request->input('frequencia', []);
        $professorId = auth()->id();

        foreach ($frequencias as $aluno_id => $status) {
            Frequencia::updateOrCreate(
                [
                    'aluno_id' => $aluno_id,
                    'turma_id' => $turma_id,
                    'data' => $data,
                ],
                [
                    'professor_id' => $professorId,
                    'status' => $status,
                    'confirmada' => true,  // Marca a chamada como confirmada no momento de salvar
                ],
            );
        }

        return redirect()->back()->with('success', 'Frequência registrada e confirmada com sucesso!');
    }

    public function dadosFrequencia(Request $request)
    {
        $data = $request->query('data');
        $turma_id = $request->query('turma_id') ?? session('turma_id');

        if (!$data || !$turma_id) {
            return response()->json([], 400);
        }

        $frequencias = Frequencia::where('data', $data)->where('turma_id', $turma_id)->get();

        $resultado = $frequencias->pluck('status', 'aluno_id');

        // Envia também se a chamada está confirmada (para a view bloquear edição)
        $confirmada = $frequencias->where('confirmada', true)->count() > 0;

        return response()->json([
            'frequencias' => $resultado,
            'confirmada' => $confirmada,
        ]);
    }
}
