<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\professorController;
use App\Http\Controllers\alunoController;
use App\Http\Controllers\diretorController;
use App\Http\Controllers\frequenciaController;



    Route::get('/manutencao', fn () => view('construcao'))->name('construcao');

// ---------------------------
// ROTAS DE LOGIN E LOGOUT
// ---------------------------

Route::get('/', fn () => redirect('/login'));

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// ---------------------------
// ROTAS PROTEGIDAS POR LOGIN
// ---------------------------

Route::middleware('auth')->group(function () {

    // Painel principal
    Route::get('/painel', fn () => view('painel.index'))->name('painel');

    // Painel por função (ex: /painel/professor)
    Route::get('/painel/{funcao}', fn ($funcao) => view("painel.$funcao"))->name('painel.funcao');


    // ---------------------------
    // ROTAS PARA DIRETORES
    // ---------------------------

    Route::prefix('diretor')->group(function () {
        Route::get('/boletins', fn () => view('diretor.boletins'))->name('boletins');
        Route::get('/financeiro', fn () => view('diretor.financeiro'))->name('financeiro');
        Route::get('/funcionarios', [diretorController::class, 'funcionarioIndex'])->name('funcionarios');
        Route::post('/boletins/imprimir-turma', [diretorController::class, 'imprimirPorTurma'])->name('boletins.imprimirPorTurma');
        Route::get('/boletins/turma', [diretorController::class, 'selecionarTurma'])->name('diretor.turma');

            Route::prefix('alunos')->name('alunos.')->group(function () {
            Route::get('/', [AlunoController::class, 'alunosIndex'])->name('index');
            Route::get('/cadastrar', [AlunoController::class, 'create'])->name('create');
            Route::post('/', [AlunoController::class, 'store'])->name('store');
            Route::get('Alunos/Detalhes/{aluno_id}', [AlunoController::class, 'detalhe'])->name('detalhe');
       

        });
    });

// Página de filtro e listagem de alunos para imprimir boletim (GET)
Route::get('/diretor/boletins/alunos', [DiretorController::class, 'listarAlunosParaBoletim'])
    ->name('boletins.alunos');

// Processa o formulário para imprimir boletim do aluno selecionado (POST)
Route::post('/diretor/boletins/imprimir-aluno', [DiretorController::class, 'imprimirPorAluno'])
    ->name('boletins.imprimirPorAluno');
    // ---------------------------
    // ROTAS PARA PROFESSORES
    // ---------------------------

    Route::prefix('professor')->name('professor.')->group(function () {

        Route::post('/selectTurma', [ProfessorController::class, 'selectTurma'])->name('selectTurma');

        Route::get('/turmas', [ProfessorController::class, 'showAlunos'])->name('turma');
        Route::get('/aluno', [AlunoController::class, 'showDados'])->name('aluno.detalhes');
        Route::get('/atividades', fn () => view('professores.atividades'))->name('atividades');
        Route::get('/diario', fn () => view('professores.diario'))->name('diario');
        Route::get('/fechamento', fn () => view('professores.fechamento'))->name('fechamento');
        Route::get('/calendario', fn () => view('professores.calendario'))->name('calendario');

        //Frequencia 

        Route::get('/frequencia', [frequenciaController::class, 'create'])->name('frequencia');
        Route::get('/frequencia/dados', [frequenciaController::class, 'dadosFrequencia'])->name('frequencia.dados');
            
        Route::post('/frequencia/{turma}', [frequenciaController::class, 'store'])->name('frequencia.store');

    });

});

//Photos Alunos 

use App\Http\Controllers\AlunoPhotoController;

Route::get('/private/alunos/{nome}/photo', [AlunoPhotoController::class, 'show'])
    ->name('private.alunos.photo');
