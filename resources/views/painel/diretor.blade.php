@extends('layout.app')

@section('title', 'Painel Diretor')

@section('content')
<div class="row g-3 mt-3 ms-3 me-2">

  {{-- Indicadores rápidos --}}
  @php
    $cards = [
      ['title' => 'Boletins Finalizados', 'value' => '90 alunos', 'color' => 'success', 'icon' => 'bi-check2-circle'],
      ['title' => 'Total de Alunos', 'value' => '120', 'color' => 'primary', 'icon' => 'bi-people-fill'],
      ['title' => 'Boletins Incompletos', 'value' => '7 alunos', 'color' => 'warning', 'icon' => 'bi-exclamation-triangle-fill'],
      ['title' => 'Frequência da Semana', 'value' => '4 / 7', 'color' => 'info', 'icon' => 'bi-calendar-check-fill'],
    ];
  @endphp

  @foreach ($cards as $card)
    <div class="col-12 col-sm-6 col-md-3">
      <div class="card shadow-sm rounded-3 border-0">
        <div class="card-body d-flex align-items-center gap-3 py-3 px-3">
          <div class="bg-{{ $card['color'] }} bg-opacity-10 text-{{ $card['color'] }} rounded-circle p-3" style="min-width:50px; min-height:50px; display:flex; align-items:center; justify-content:center;">
            <i class="bi {{ $card['icon'] }} fs-4"></i>
          </div>
          <div>
            <h6 class="text-uppercase text-muted mb-1" style="letter-spacing: 0.05em; font-size:0.85rem;">{{ $card['title'] }}</h6>
            <h5 class="mb-0 fw-bold" style="font-size:1.25rem;">{{ $card['value'] }}</h5>
          </div>
        </div>
      </div>
    </div>
  @endforeach

{{-- Pendências, Riscos e Ocorrências --}}
<div class="col-12 col-md-4">
  <div class="card shadow-sm rounded-3 border-0 p-3 h-100 d-flex flex-column">
    <h5 class="mb-3 fw-semibold">Pendências Críticas</h5>
    <ul class="list-group list-group-flush">
      <li class="list-group-item border-0 ps-0 text-danger fw-semibold small">
        <i class="bi bi-exclamation-circle-fill me-2"></i>5 notas não lançadas no 2º ano
      </li>
      <li class="list-group-item border-0 ps-0 text-warning fw-semibold small">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>Aluno sem boletim no 1º ano
      </li>
      <li class="list-group-item border-0 ps-0 text-info fw-semibold small">
        <i class="bi bi-info-circle-fill me-2"></i>Faltam 45 dias para entrega dos boletins
      </li>
    </ul>
    <div class="text-end mt-auto pt-2">
      <a href="{{ route('construcao') }}" class="text-decoration-none small text-primary">Ver todas</a>
    </div>
  </div>
</div>


  <div class="col-12 col-md-4">
    <div class="card shadow-sm rounded-3 border-0 p-3 h-100">
      <h5 class="mb-3 fw-semibold">Alunos em Risco</h5>
      <ul class="list-group list-group-flush small">
        <li class="list-group-item border-0 ps-0">
          Aluno Teste 1 — 5º ano — <span class="text-danger fw-bold">Média abaixo de 4</span>
        </li>
        <li class="list-group-item border-0 ps-0">
          Aluno Teste 2 — 5º ano — <span class="text-warning fw-bold">Faltas excessivas</span>
        </li>
      </ul>
      <div class="text-end mt-auto pt-2">
        <a href="{{ route('construcao') }}" class="text-decoration-none small text-primary">Ver todas</a>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-4">
    <div class="card shadow-sm rounded-3 border-0 p-3 h-100">
      <h5 class="mb-3 fw-semibold d-flex align-items-center gap-2">
        <i class="bi bi-flag-fill text-danger fs-5"></i> Últimas Ocorrências
      </h5>
      <ul class="list-group list-group-flush small" style="max-height: 200px; overflow-y: auto;">
        <li class="list-group-item border-0 ps-0">
          <span class="fw-bold">Aluno João Silva</span> — Atraso recorrente <span class="text-muted">em 05/07</span>
        </li>
        <li class="list-group-item border-0 ps-0">
          <span class="fw-bold">Aluno Maria Souza</span> — Desrespeito em sala <span class="text-muted">em 04/07</span>
        </li>
        <li class="list-group-item border-0 ps-0">
          <span class="fw-bold">Aluno Pedro Lima</span> — Saída sem autorização <span class="text-muted">em 02/07</span>
        </li>
      </ul>
      <div class="text-end mt-2">
        <a href="{{ route('construcao') }}" class="text-decoration-none small text-primary">Ver todas</a>
      </div>
    </div>
  </div>

  {{-- Relatórios --}}
  <div class="col-12 col-lg-7">
    <div class="card shadow-sm rounded-3 border-0 p-3">
      <h5 class="mb-4 fw-semibold d-flex align-items-center gap-2">
        <i class="bi bi-bar-chart-fill fs-4"></i> Gerar Relatórios
      </h5>
      <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('construcao') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm flex-fill flex-sm-auto" style="min-width: 130px;">
          <i class="bi bi-people"></i> Por Turma
        </a>
        <a href="{{ route('construcao') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm flex-fill flex-sm-auto" style="min-width: 130px;">
          <i class="bi bi-person"></i> Por Aluno
        </a>
        <a href="{{ route('construcao') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm flex-fill flex-sm-auto" style="min-width: 130px;">
          <i class="bi bi-journal-text"></i> Por Disciplina
        </a>
        <a href="{{ route('construcao') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm flex-fill flex-sm-auto" style="min-width: 130px;">
          <i class="bi bi-award"></i> Notas Finais
        </a>
      </div>
    </div>
  </div>

  {{-- Funcionalidades Extras --}}
  <div class="col-12 col-lg-5">
    <div class="card shadow-sm rounded-3 border-0 p-3 h-100">
      <h5 class="mb-4 fw-semibold">Funcionalidades Avançadas</h5>
      <div class="d-grid gap-2">
        <a href="{{ route('construcao') }}" class="btn btn-outline-secondary d-flex align-items-center gap-3 px-3 py-3 rounded-3 shadow-sm text-start">
          <i class="bi bi-shield-lock fs-4 text-secondary"></i>
          Auditoria de Alterações
        </a>
        <a href="{{ route('construcao') }}" class="btn btn-outline-secondary d-flex align-items-center gap-3 px-3 py-3 rounded-3 shadow-sm text-start">
          <i class="bi bi-box-arrow-up-right fs-4 text-secondary"></i>
          Exportação para Secretaria
        </a>
        <a href="{{ route('construcao') }}" class="btn btn-outline-secondary d-flex align-items-center gap-3 px-3 py-3 rounded-3 shadow-sm text-start">
          <i class="bi bi-file-earmark-lock fs-4 text-secondary"></i>
          Assinatura Digital
        </a>
        <a href="{{ route('construcao') }}" class="btn btn-outline-secondary d-flex align-items-center gap-3 px-3 py-3 rounded-3 shadow-sm text-start">
          <i class="bi bi-clipboard-data fs-4 text-secondary"></i>
          Relatórios Oficiais
        </a>
      </div>
    </div>
  </div>

</div>
@endsection
