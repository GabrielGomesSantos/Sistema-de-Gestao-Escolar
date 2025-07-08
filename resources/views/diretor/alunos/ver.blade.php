@extends('layout.app')

@section('title', 'Detalhes do Aluno')

@section('content')
<div class="container mt-4">
  <div class="card card-custom shadow-sm p-4">
    
    {{-- Cabeçalho com Foto --}}
    <div class="row align-items-center mb-4">
      <div class="col-md-2 text-center">
        <img src="{{ route('private.alunos.photo', ['nome' => $infos->nome]) }}" alt="Foto do aluno" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;" >
      </div>
      <div class="col-md-8">
        <h4 class="mb-0">{{ $infos->nome }}</h4>
        <small class="text-muted">{{ $infos->matricula }}| {{ $infos-> turmas}}</small>
      </div>
      <div class="col-md-2 text-end">
        <a href="#" class="btn btn-outline-success">📁 Exportar Ficha</a>
      </div>
    </div>

    <hr>

    {{-- Informações Pessoais --}}
    <h5 class="mb-3">Informações Pessoais</h5>
    <div class="row mb-4">
      <div class="col-md-4">
        <strong>Sexo:</strong>
        <p>
            {{ $infos->sexo == 'F' ? 'Feminino' : ($infos->sexo == 'M' ? 'Masculino' : '') }}
        </p>
      </div>
      <div class="col-md-4">
        <strong>Data de Nascimento:</strong>
        <p>{{ $infos-> data_nascimento}}</p>
      </div>
      <div class="col-md-4">
        <strong>Turma:</strong>
        <p>{{ $infos-> turmas }}</p>
      </div>
    </div>

    {{-- Responsáveis --}}
    <h5 class="mb-3">Informações dos Responsáveis</h5>
    <div class="row mb-4">
      <div class="col-md-4">
        <strong>Nome do Pai:</strong>
        <p>{{ $infos-> nome_pai }}</p>
      </div>
      <div class="col-md-4">
        <strong>Nome da Mãe:</strong>
        <p>Maria Cardoso</p>
      </div>
      <div class="col-md-4">
        <strong>Telefone do Responsável:</strong>
        <p>(32) 99999-9999</p>
      </div>
      <div class="col-md-12">
        <strong>Endereço:</strong>
        <p>Rua das Flores, 123 - Centro, Juiz de Fora - MG</p>
      </div>
    </div>

    <hr>

    {{-- Acadêmico --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="mb-0">Informações Acadêmicas - 1º Bimestre</h5>
      <div>
        <a href="#" class="btn btn-outline-primary btn-sm me-1">Bimestre</a>
        <a href="#" class="btn btn-outline-primary btn-sm me-1">Semestre</a>
        <a href="#" class="btn btn-outline-primary btn-sm">Total</a>
      </div>
    </div>

    <div class="row g-4">
      {{-- Notas --}}
      <div class="col-md-6">
        <div class="card p-3 h-100">
          <h6 class="text-center mb-3">Notas</h6>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between"><strong>Matemática</strong> <span>7.5</span></li>
            <li class="list-group-item d-flex justify-content-between"><strong>Português</strong> <span>8.0</span></li>
            <li class="list-group-item d-flex justify-content-between"><strong>História</strong> <span>6.2</span></li>
            <li class="list-group-item d-flex justify-content-between"><strong>Ciências</strong> <span>9.0</span></li>
          </ul>
        </div>
      </div>

      {{-- Frequência --}}
      <div class="col-md-6">
        <div class="card p-3 h-100">
          <h6 class="text-center mb-3">Frequência</h6>
          <p><strong>Presenças:</strong> 72</p>
          <p><strong>Faltas:</strong> 8</p>
          <div class="progress" style="height: 20px;">
            <div class="progress-bar bg-success" style="width: 90%;">90%</div>
          </div>
        </div>
      </div>

      {{-- Diário de Classe --}}
      <div class="col-md-6">
        <div class="card p-3 h-100">
          <h6 class="mb-2">Diário de Classe</h6>
          <ul class="list-group">
            <li class="list-group-item">
              <small class="text-muted">01/06</small><br>
              Leitura de conto e interpretação textual
            </li>
            <li class="list-group-item">
              <small class="text-muted">03/06</small><br>
              Frações e porcentagens
            </li>
            <li class="list-group-item">
              <small class="text-muted">05/06</small><br>
              Aula prática de ciências - ecossistemas
            </li>
          </ul>
        </div>
      </div>

      {{-- Ocorrências --}}
      <div class="col-md-6">
        <div class="card p-3 h-100">
          <h6 class="mb-2">Ocorrências</h6>
          <div class="mb-3 border-start ps-3 border-danger">
            <strong>Advertência</strong>
            <p class="mb-1">Desrespeito com colega em sala de aula.</p>
            <small class="text-muted">24/05/2025</small>
          </div>
          <div class="border-start ps-3 border-infos">
            <strong>Elogio</strong>
            <p class="mb-1">Ajudou na organização da sala após a aula.</p>
            <small class="text-muted">27/05/2025</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
