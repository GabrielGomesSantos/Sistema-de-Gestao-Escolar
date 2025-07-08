@extends('layout.app')

@section('title', 'Funcionários')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Funcionários</h2>
    <a href="{{ route('construcao') }}" class="btn btn-primary">
      <i class="bi bi-plus-lg me-1"></i> Novo Funcionário
    </a>
  </div>

  {{-- Filtros de busca --}}
  <form method="GET" action="#" class="mb-3">
    <div class="row g-2">
      <div class="col-md-4">
        <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ request('nome') }}">
      </div>
      <div class="col-md-3">
        <select name="funcao" class="form-select">
          <option value="">Todas as Funções</option>
          <option value="professor" {{ request('funcao') == 'professor' ? 'selected' : '' }}>Professor</option>
          <option value="secretario" {{ request('funcao') == 'secretario' ? 'selected' : '' }}>Secretário</option>
          <option value="coordenador" {{ request('funcao') == 'coordenador' ? 'selected' : '' }}>Coordenador</option>
        </select>
      </div>
      <div class="col-md-3">
        <select name="status" class="form-select">
          <option value="">Todos os Status</option>
          <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Ativo</option>
          <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inativo</option>
        </select>
      </div>
      <div class="col-md-2 text-end">
        <button type="submit" class="btn btn-outline-primary w-100">
          <i class="bi bi-funnel"></i> Filtrar
        </button>
      </div>
    </div>
  </form>

  {{-- Tabela com rolagem --}}
  <div class="card shadow-sm rounded-4 border-0">
    <div class="card-body p-0" style="max-height: 450px; overflow-y: auto;">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light sticky-top" style="top: 0; z-index: 1;">
          <tr>
            <th>Nome</th>
            <th>Função</th>
            <th>Área</th>
            <th>Último Acesso</th>
            <th class="text-end">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($funcionarios as $funcionario)
          <tr>
            <td>{{ $funcionario->nome }}</td>
            <td>{{ $funcionario->funcao }}</td>
            <td>{{ $funcionario->turmas }}</td>
            <td><small class="text-muted">Hoje, 09:42</small></td>
            <td class="text-end">
              <a href="#" class="btn btn-sm btn-outline-primary me-1" title="Ver detalhes">
                <i class="bi bi-eye"></i>
              </a>
              <a href="#" class="btn btn-sm btn-outline-warning me-1" title="Editar">
                <i class="bi bi-pencil"></i>
              </a>
              <form action="#" method="POST" class="d-inline-block" onsubmit="return confirm('Deseja mesmo excluir este funcionário?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" title="Excluir">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
