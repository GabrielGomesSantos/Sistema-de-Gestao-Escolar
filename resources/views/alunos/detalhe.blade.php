@extends('layout.app')

@section('title', 'Detalhes do Aluno')

@section('content')
<div class="container mt-4">
  <div class="card card-custom shadow-sm p-4">
    
    {{-- Cabeçalho --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h4 class="mb-1">Bruno Cardoso</h4>
        <p class="mb-0 text-muted">Turma: 1 Ano</p>
        <p class="mb-0 text-muted">Matrícula: 000018</p>
      </div>
      <a href="#" class="btn btn-outline-success">
        📁 Exportar Ficha
      </a>
    </div>

    <hr>

    {{-- Informações Pessoais --}}
    <div class="row mb-4">
      <div class="col-md-4">
        <h6 class="text-muted">Sexo</h6>
        <p>Masculino</p>
      </div>
      <div class="col-md-4">
        <h6 class="text-muted">Data de Nascimento</h6>
        <p>12/03/2008</p>
      </div>
      <div class="col-md-4">
        <h6 class="text-muted">Responsável</h6>
        <p>Maria Cardoso</p>
      </div>
    </div>

    <hr>
    
    {{-- Painéisa de Informações Acadêmicas --}}
    <div class="d-flex justify-content-between">
      <h4 class="mb-3">Informações Acadêmicas - 1 Bimestre</h4>
        <div class="mb-2">
          <a href="#" class="btn btn-outline-success">Bimestre</a>
          <a href="#" class="btn btn-outline-success">Semestre</a>
          <a href="#" class="btn btn-outline-success">Total</a>
        </div>
      </div>
      
      <div class="row g-4">
        {{-- Notas --}}
        <div class="col-md-6">
          <div class="card p-3 h-100">
            <h5 class="mb-2 text-center">Notas</h5>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between">
                <strong>Matemática</strong> <span>7.5</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Português</strong> <span>8.0</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>História</strong> <span>6.2</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Ciências</strong> <span>9.0</span>
              </li>
            </ul>
          </div>
        </div>

        {{-- Frequência --}}
        <div class="col-md-6">
          <div class="card p-3 h-100">
            <h6 class="mb-2">Frequência</h6>
            <p>Presenças: <strong>72</strong></p>
            <p>Faltas: <strong>8</strong></p>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar bg-success" role="progressbar"
                style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                90%
              </div>
            </div>
          </div>
        </div>

        {{-- Diário de Classe --}}
        <div class="col-md-6">
          <div class="card p-3">
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
          <div class="card p-3">
            <h6 class="mb-2">Ocorrências</h6>
            <div class="mb-2 border-start ps-2 border-danger">
              <strong>Advertência</strong>
              <p class="mb-0">Desrespeito com colega em sala de aula.</p>
              <small class="text-muted">24/05/2025</small>
            </div>
            <div class="mb-2 border-start ps-2 border-info">
              <strong>Elogio</strong>
              <p class="mb-0">Ajudou na organização da sala após a aula.</p>
              <small class="text-muted">27/05/2025</small>
            </div>
          </div>
        </div>
    </div>

  </div>
</div>
@endsection
