@extends('layout.app')

@section('title', 'Painel Professor')

@section('content')
<div class="row g-4 mt-3 ms-3 me-2"">
  {{-- Indicadores rápidos --}}
  <div class="col-md-3">
    <div class="card card-custom p-3">
      <h6 class="mb-2">Boletins Finalizados</h6>
      <h3 class="mb-0">90 alunos</h3>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-custom p-3">
      <h6 class="mb-2">Total de Alunos</h6>
      <h3 class="mb-0">120</h3>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-custom p-3">
      <h6 class="mb-2">Boletins Incompletos</h6>
      <h3 class="mb-0">7 alunos</h3>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-custom p-3">
      <h6 class="mb-2">Frequência da Semana</h6>
      <h3 class="mb-0">4 / 7</h3>
    </div>
  </div>

  {{-- Pendências e Riscos --}}
  <div class="col-md-6">
    <div class="card card-custom p-3">
      <h6 class="mb-3">Pendências Críticas</h6>
      <ul class="mb-0">
        <li class="text-danger">5 notas não lançadas no 2º ano</li>
        <li class="text-warning">Aluno sem boletim no 1º ano</li>
        <li class="text-info">Faltam 45 dias para entrega dos boletins</li>
      </ul>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card card-custom p-3">
      <h6 class="mb-3">Alunos em Risco</h6>
      <ul class="mb-0">
        <li>Aluno Teste 1 — 5º ano — <span class="text-danger">Média abaixo de 4</span></li>
        <li>Aluno Teste 2 — 5º ano — <span class="text-warning">Faltas excessivas</span></li>
      </ul>
    </div>
  </div>

  {{-- Relatórios --}}
  <div class="col-md-7">
    <div class="card card-custom p-3">
      <h6 class="mb-3">Gerar Relatório</h6>
      <div class="d-flex gap-4">
        <button class="btn btn-outline-primary">Por Turma</button>
        <button class="btn btn-outline-primary">Por Aluno</button>
        <button class="btn btn-outline-primary">Por Disciplina</button>
        <button class="btn btn-outline-primary">Notas Finais</button>
      </div>
    </div>
  </div>
</div>
@endsection
