@php
  $turmas = Auth::user()->turmas ?? collect([]);
  $turmaSelecionada = session('turma_id');
  $turmaAtual = $turmas->firstWhere('id', $turmaSelecionada);
  $currentRoute = Route::currentRouteName();

  if (!session()->has('turma_id')) {
    session()->put('turma_id', $turmaAtual?->id);
  }
@endphp

@if ($currentRoute !== 'alunos.create') {{-- Corrigido: evita mostrar na tela de cadastro --}}
  <div class="topbar d-flex justify-content-between align-items-center">
    <div>
      <h5 class="mb-0">
        {{ $title ?? 'Dashboard' }}
        @if($turmaAtual)
          - {{ $turmaAtual->nome }}
        @endif
      </h5>
    </div>

    <div class="d-flex align-items-center gap-3">
      {{-- Seletor de turma (somente para professores com mais de uma) --}}
      @if(Auth::user()->funcao === 'professor' && $turmas->count() > 1)
        <form action="{{ route('professor.selectTurma') }}" method="POST">
          @csrf
          <select name="turma_id" onchange="this.form.submit()" class="form-select form-select-sm">
            @foreach ($turmas as $turma)
              <option value="{{ $turma->id }}" {{ $turmaSelecionada == $turma->id ? 'selected' : '' }}>
                {{ $turma->nome }}
              </option>
            @endforeach
          </select>
        </form>
      @endif

      {{-- Notificações --}}
      <a href="#" class="text-dark position-relative">
        <i class="bi bi-bell fs-5 text-white"></i>
      </a>

      {{-- Avatar (comente se quiser usar depois) --}}
      {{-- <img src="{{ asset('build/assets/avatar.png') }}" alt="Avatar" class="avatar"> --}}
    </div>
  </div>
@endif
