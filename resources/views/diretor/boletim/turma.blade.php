@extends('layout.app')

@section('title', 'Imprimir Boletins por Turma')

@section('content')
<div class="container py-4">
  <div class="card shadow-sm p-4">
    <h4 class="mb-4 text-center">Selecionar Turma para Imprimir Boletins</h4>

    {{-- Filtro de Ano --}}
    <form action="{{ route('boletins.imprimirPorTurma') }}" method="GET" class="mb-4">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <select name="ano" class="form-select" onchange="this.form.submit()">
            <option value="">Filtrar por Ano Letivo</option>
            @foreach ($anos as $ano)
              <option value="{{ $ano }}" {{ (isset($anoSelecionado) && $anoSelecionado == $ano) ? 'selected' : '' }}>
                {{ $ano }}
              </option>
            @endforeach
          </select>
        </div>
      </div>
    </form>

    {{-- Form para selecionar turma e imprimir --}}
    <form action="{{ route('boletins.imprimirPorTurma') }}" method="POST">
      @csrf

      <div class="row g-4">
        @foreach ($turmas as $turma)
          <div class="col-md-4">
            <label for="turma{{ $turma->id }}" class="card p-3 cursor-pointer h-100 border 
              d-flex flex-column justify-content-center
              {{ old('turma_id') == $turma->id ? 'border-success shadow-sm' : 'border-secondary' }}" 
              style="transition: box-shadow 0.3s ease;">
              <input 
                class="form-check-input d-none" 
                type="radio" 
                name="turma_id" 
                id="turma{{ $turma->id }}" 
                value="{{ $turma->id }}" 
                required
                {{ old('turma_id') == $turma->id ? 'checked' : '' }}
              >
              <div>
                <h5 class="mb-2">{{ $turma->nome }}</h5>
                <small class="text-muted">Turno: {{ $turma->turno }} | Ano: {{ $turma->ano_letivo }}</small>
              </div>
            </label>
          </div>
        @endforeach
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-success px-5">
          🖨️ Imprimir Boletins
        </button>
      </div>
    </form>
  </div>
</div>

<style>
  .cursor-pointer {
    cursor: pointer;
  }
  label.card:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  }
  input.form-check-input:checked + div {
    font-weight: 600;
    color: #198754; /* verde bootstrap */
  }
</style>
@endsection
