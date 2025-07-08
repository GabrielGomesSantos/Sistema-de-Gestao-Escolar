@extends('layout.app')

@section('title', 'Alunos')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Alunos</h2>
            <a href="{{ route('alunos.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Novo Aluno
            </a>
        </div>

        {{-- Filtros de busca --}}
        <form method="GET" action="#" class="mb-3">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="nome" class="form-control" placeholder="Nome"
                        value="{{ request('nome') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="matricula" class="form-control" placeholder="Matrícula"
                        value="{{ request('matricula') }}">
                </div>
                <div class="col-md-3">
                    <select name="turma_id" class="form-select">
                        <option value="">Todas as Turmas</option>
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}" {{ request('turma_id') == $turma->id ? 'selected' : '' }}>
                                {{ $turma->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">Todos os Status</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-funnel"></i> Filtrar
                    </button>
                    <a href="{{ route('alunos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i> Limpar
                    </a>
                </div>
            </div>
        </form>

        {{-- Tabela com rolagem --}}
        <div class="card shadow-sm rounded-4 border-0">
            <div class="card-body p-0" style="max-height: 450px; overflow-y: auto;">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light sticky-top" style="top: 0; z-index: 1;">
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Matrícula</th>
                            <th scope="col">Turma</th>
                            <th scope="col">Status</th>
                            <th class="text-end" scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alunos as $aluno)
                            <tr>
                                <td>
                                    <img src="{{ $aluno->foto ?? asset('img/avatar-default.png') }}" alt="Foto do Aluno"
                                        class="rounded-circle" width="40" height="40">
                                </td>
                                <td>{{ $aluno->nome }}</td>
                                <td>{{ $aluno->matricula }}</td>
                                <td>{{ $aluno->turma->nome ?? '-' }}</td>
                                <td>
                                    @if ($aluno->status)
                                        <span class="badge bg-success">Ativo</span>
                                    @else
                                        <span class="badge bg-secondary">Inativo</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('alunos.detalhe', $aluno->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Ver detalhes">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    {{-- <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Editar"> --}}
                                    <a href="#" class="btn btn-sm btn-outline-warning me-1" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    {{-- <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Deseja mesmo excluir este aluno?')"> --}}
                                    <form action="#" method="POST" class="d-inline-block"
                                        onsubmit="return confirm('Deseja mesmo excluir este aluno?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Excluir">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Nenhum aluno encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
