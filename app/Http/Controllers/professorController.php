<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;

class professorController extends Controller{
    

    public function selectTurma(Request $request){  
        $request->validate([
            'turma_id' => 'required|exists:turmas,id',
        ]);

        session(['turma_id' => $request->turma_id]);

        return redirect()->back();
    }

    public function showAlunos(){

        $turma = Turma::with('alunos')->find(session('turma_id'));

        return view('professores.turma', [
            'turma' => $turma,
            'alunos' => $turma->alunos
        ]);

    }


}
