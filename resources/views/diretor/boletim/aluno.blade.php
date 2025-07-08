@extends('layout.app')

@section('title', 'Imprimir Boletins por Aluno')

@section('content')
<div class="container py-4">

    <h3 class="mb-4 text-center fw-bold">Imprimir Boletins por Aluno</h3>

    {{-- Filtros de busca --}}
    <form method="GET" action="{{ route('boletins.alunos') }}" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ request('nome') }}" placeholder="Nome do aluno">
            </div>
            <div class="col-md-3">
                <label class="form-label">Matrícula</label>
                <input type="text" name="matricula" class="form-control" value="{{ request('matricula') }}" placeholder="Matrícula">
            </div>
            <div class="col-md-3">
                <label class="form-label">Turma</label>
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
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">Todos</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Pronto</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inacabado</option>
                </select>
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bi bi-funnel-fill"></i> Filtrar
                </button>
                <a href="{{ route('boletins.alunos') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle"></i> Limpar
                </a>
            </div>
        </div>
    </form>

    {{-- Tabela com alunos --}}
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body p-0" style="max-height: 450px; overflow-y: auto;">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light sticky-top" style="top: 0; z-index: 1;">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Turma</th>
                        <th scope="col">Status</th>
                        <th class="text-end" scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alunos as $aluno)
                        <tr>
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
                                <form method="POST" action="{{ route('boletins.imprimirPorAluno') }}" target="_blank">
                                    @csrf
                                    <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Imprimir Boletim">
                                        <i class="bi bi-printer-fill"></i> Imprimir
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
