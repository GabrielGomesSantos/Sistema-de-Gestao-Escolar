@extends('layout.app')

@section('title', 'Página em Construção')

@section('content')
<style>
  .icon-spinner {
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
  }
</style>

<div class="container mt-5">
  <div class="d-flex justify-content-center">
    <div class="card card-custom shadow-sm p-5 text-center" style="max-width: 500px; width: 100%;">
      
      <div class="mb-4">
        <i class="bi bi-tools icon-spinner" style="font-size: 4rem; color: #0b4d94;"></i>
      </div>
      
      <h4 class="mb-3">Página em Construção</h4>
      <p class="text-muted mb-4">
        Estamos trabalhando para finalizar essa funcionalidade.<br>
        Em breve estará disponível para você!
      </p>

      <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
        ⬅ Voltar
      </a>
    </div>
  </div>
</div>
@endsection
