@extends('layout.app')

@section('title', 'Cadastrar Aluno')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Cadastro de Aluno</h2>
        <a href="#" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <input type="text" name="matricula" id="matricula" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="nome_pai" class="form-label">Nome do Pai</label>
                        <input type="text" name="nome_pai" id="nome_pai" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="nome_mae" class="form-label">Nome da Mãe</label>
                        <input type="text" name="nome_mae" id="nome_mae" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="turma_id" class="form-label">Turma</label>
                        <select name="turma_id" id="turma_id" class="form-select" required>
                            <option value="">Selecione</option>
                            @foreach($turmas as $turma)
                                <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select">
                            <option value="">Selecione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="telefone_responsavel" class="form-label">Telefone do Responsável</label>
                        <input type="text" name="telefone_responsavel" id="telefone_responsavel" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" name="endereco" id="endereco" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="email_edu" class="form-label">Email Educacional</label>
                        <input type="email" name="email_edu" id="email_edu" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="1" selected>Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i> Salvar Aluno
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
