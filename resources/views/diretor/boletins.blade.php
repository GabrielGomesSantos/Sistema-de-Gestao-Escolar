@extends('layout.app')

@section('title', 'Boletins')

@section('content')

<div class="container py-3">

  {{-- Indicadores rápidos --}}
  <div class="row g-3 mb-4">
    @php
      $indicadores = [
        ['label' => 'Total de Alunos', 'valor' => '120 alunos', 'icon' => 'bi-people-fill', 'color' => 'primary'],
        ['label' => 'Boletins Incompletos', 'valor' => '40 Boletins', 'icon' => 'bi-exclamation-circle-fill', 'color' => 'warning'],
        ['label' => 'Prazo do Bimestre', 'valor' => '37 dias', 'icon' => 'bi-clock-fill', 'color' => 'info'],
        ['label' => 'Turmas Finalizadas', 'valor' => '4 / 7', 'icon' => 'bi-check2-circle', 'color' => 'success'],
      ];
    @endphp

    @foreach ($indicadores as $indicador)
      <div class="col-md-3 col-sm-6">
        <div class="card border-{{ $indicador['color'] }} shadow-sm p-3 text-center h-100">
          <i class="bi {{ $indicador['icon'] }} fs-2 mb-2 text-{{ $indicador['color'] }}"></i>
          <h6 class="mb-1 text-muted">{{ $indicador['label'] }}</h6>
          <h4 class="fw-bold">{{ $indicador['valor'] }}</h4>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Título da seção de relatórios --}}
  <div class="mb-4 text-center">
    <h3 class="fw-semibold">Gerar Relatório</h3>
  </div>

  {{-- Opções de relatório --}}
  <div class="row g-4 justify-content-center">
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="{{ route('diretor.turma') }}" class="text-decoration-none">
        <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
          <i class="bi bi-people-fill fs-1 mb-3 text-primary"></i>
          <p class="fs-6 fw-semibold text-dark m-0">Gerar Boletins de uma Turma</p>
        </div>
      </a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="{{ route('boletins.alunos') }}" class="text-decoration-none">
        <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
          <i class="bi bi-person-fill fs-1 mb-3 text-primary"></i>
          <p class="fs-6 fw-semibold text-dark m-0">Gerar Boletins de um Aluno</p>
        </div>
      </a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="{{ route('construcao') }}" class="text-decoration-none">
        <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
          <i class="bi bi-file-earmark-fill fs-1 mb-3 text-primary"></i>
          <p class="fs-6 fw-semibold text-dark m-0">Boletins já Gerados</p>
        </div>
      </a>
    </div>
  </div>

</div>

<style>
  .hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease;
  }
</style>

@endsection
