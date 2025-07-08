@extends('layout.app')

@section('title', 'Turma')

@section('content')
<div class="row g-4 ms-3 me-2">
{{-- Indicadores Rápidos --}}
  <div class="row g-4 mt-2">
    <div class="col-md-3">
      <div class="card card-custom p-3 shadow-sm">
        <h6 class="mb-2 text-muted">Faltas na Semana</h6>
        <h3 class="mb-0 text-danger">35 faltas</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-custom p-3 shadow-sm">
        <h6 class="mb-2 text-muted">Notas abaixo da média</h6>
        <h3 class="mb-0 text-warning">8 alunos</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-custom p-3 shadow-sm">
        <h6 class="mb-2 text-muted">Ocorrências Recentes</h6>
        <h3 class="mb-0 text-primary">3 registros</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-custom p-3 shadow-sm">
        <h6 class="mb-2 text-muted">Alunos Ativos</h6>
        <h3 class="mb-0 text-success">120</h3>
      </div>
    </div>
  </div>

{{-- Tabela de Alunos --}}
  <div class="col-12">
    <div class="card card-custom p-4 shadow-sm mt-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Lista de Alunos</h5>
        <a href="#" class="btn btn-sm btn-outline-success">
          📁 Exportar Dados
        </a>
      </div>
      
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Matrícula</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-end">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($alunos as $aluno)
              <tr>
                <td class="align-middle">{{ $aluno->nome }}</td>
                <td class="align-middle">{{ $aluno->matricula }}</td>
                <td class="align-middle">
                  {!! $aluno->status ? '<span class="badge align-middle bg-success px-3 py-2">Ativo</span>' : '<span class="badge align-middle bg-secondary px-3 py-2">Inativo</span>' !!}
                </td>
                <td class="text-end">
                  <a href="{{ route('professor.aluno.detalhes', $aluno->id) }}" class="btn btn-sm btn-outline-primary">
                    👁 Ver Detalhes
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
