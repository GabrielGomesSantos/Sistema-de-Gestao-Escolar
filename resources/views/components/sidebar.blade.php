@php
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Route;

  $role = Auth::user()->funcao ?? 'visitante';
  $currentRoute = Route::currentRouteName();
  $turmaId = session('turma_id');

@endphp

<div class="sidebar position-fixed d-flex flex-column p-3 bg-light border-end" style="width: 220px; height: 100vh;">
  {{-- Cabeçalho da Sidebar --}}
  <div class="d-flex align-items-center mb-4">
    <img class="me-2" src="{{ asset('build/assets/logo.png') }}" alt="Logo da Escola" style="width: 36px; height: 36px;">
    <span class="fs-5 fw-semibold text-dark">Escola Democrática</span>
  </div>

  {{-- Itens de navegação --}}
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('painel.funcao', ['funcao' => $role]) }}" class="nav-link {{ request()->routeIs('painel.funcao') ? 'active' : 'text-dark' }}">
        <i class="bi bi-house-door me-2"></i> Painel Inicial
      </a>
    </li>

    @switch($role)
      @case('diretor')
        <li><a href="{{ route('boletins') }}" class="nav-link {{ request()->routeIs('boletins*') ? 'active' : 'text-dark' }}"><i class="bi bi-book me-2"></i> Boletins</a></li>
        <li><a href="{{ route('financeiro') }}" class="nav-link {{ request()->routeIs('financeiro*') ? 'active' : 'text-dark' }}"><i class="bi bi-cash me-2"></i> Financeiro</a></li>
        <li><a href="{{ route('funcionarios') }}" class="nav-link {{ request()->routeIs('funcionarios*') ? 'active' : 'text-dark' }}"><i class="bi bi-people me-2"></i> Funcionários</a></li>
        <li><a href="{{ route('alunos.index') }}" class="nav-link {{ request()->routeIs('alunos*') ? 'active' : 'text-dark' }}"><i class="bi bi-person-lines-fill me-2"></i> Alunos</a></li>
        <li><a href="{{ route('construcao') }}" class="nav-link {{ request()->routeIs('') ? 'active' : 'text-dark' }}"><i class="bi bi-archive me-2"></i> Fechamento bimestral</a></li>
        <li><a href="{{ route('construcao') }}" class="nav-link {{ request()->routeIs('') ? 'active' : 'text-dark' }}"><i class="bi bi-calendar-event me-2"></i> Calendário Letivo</a></li>
        <li><a href="{{ route('construcao') }}" class="nav-link {{ request()->routeIs('') ? 'active' : 'text-dark' }}"><i class="bi-chat-left-text me-2"></i> Comunicação interna </a></li>
        @break

      @case('professor')
        <li><a href="{{ route('professor.turma') }}" class="nav-link {{ request()->routeIs('turma') ? 'active' : 'text-dark' }}"><i class="bi bi-book me-2"></i> Minhas Turmas</a></li>
        <li><a href="{{ route('professor.atividades') }}" class="nav-link {{ request()->routeIs('atividades') ? 'active' : 'text-dark' }}"><i class="bi bi-pencil me-2"></i> Atividades</a></li>
        <li><a href="{{ route('professor.frequencia') }}" class="nav-link {{ request()->routeIs('frequencia') ? 'active' : 'text-dark' }}"><i class="bi bi-calendar me-2"></i> Frequência</a></li>
        <li><a href="{{ route('professor.diario') }}" class="nav-link {{ request()->routeIs('diario') ? 'active' : 'text-dark' }}"><i class="bi bi-journal-bookmark me-2"></i> Diário de Classe</a></li>
        <li><a href="{{ route('professor.fechamento') }}" class="nav-link {{ request()->routeIs('fechamento') ? 'active' : 'text-dark' }}"><i class="bi bi-archive me-2"></i> Fechamento Bimestral</a></li>
        <li><a href="{{ route('professor.calendario') }}" class="nav-link {{ request()->routeIs('calendario') ? 'active' : 'text-dark' }}"><i class="bi bi-calendar-event me-2"></i> Calendário Letivo</a></li>
        @break

      @case('secretaria')
        <li><a href="#" class="nav-link text-dark"><i class="bi bi-journal-text me-2"></i> Em breve</a></li>
        @break
    @endswitch
  </ul>

  {{-- Logout --}}
  <form method="POST" action="{{ route('logout') }}" class="mt-auto">
    @csrf
    <button type="submit" class="btn btn-link text-dark text-start w-100">
      <i class="bi bi-door-open me-2"></i> Sair
    </button>
  </form>
</div>
