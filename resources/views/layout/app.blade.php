<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>
  <link rel="icon" type="image/ico" href="{{ asset('favicon.ico') }}?v=2">

  {{-- Bootstrap + Ícones --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  {{-- Estilos personalizados --}}
  <style>
    body {
      background-color: #deefff;
    }

    .sidebar {
      color: #fff;
      min-height: 100vh;
    }

    .sidebar a {
      color: #fff;
      padding: 15px 20px;
      display: block;
      text-decoration: none
    }

    .sidebar a:hover {
      background-color: #e7f1ff;
      color: #0d6efd !important;
      font-weight: 400;
      border-left: 4px solid #0d6efd;
    }

    .sidebar .nav-link {
      padding: 10px 15px;
      border-radius: 0.375rem;
      transition: background 0.2s;
    }

    .sidebar .nav-link:hover {
      background-color: #2e85ff57;
    }

    .sidebar .nav-link.active {
      background-color: #e7f1ff;
      color: #0d6efd !important;
      font-weight: 500;
      border-left: 5px solid #0d6efd;
    }

    .content-wrapper.with-sidebar {
      margin-left: 220px;
    }


    .topbar {
      background-color: #0b4d94;
      padding: 10px 20px;
      border-bottom: 1px solid #dee2e6;
      color: white;
    }

    .card-custom {
      border-radius: 1rem;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
    }

    .scrollbar {
      overflow-y: auto;
    }

    .avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
    }

    .card-custom {
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .icon-large {
    font-size: 4rem;
    color: #0b4d94;
  }

  .card-indicador h6 {
    color: #6c757d;
    font-weight: 500;
  }

  .card-indicador h3 {
    font-weight: 700;
    color: #0b4d94;
  }

  .relatorio-link {
    text-decoration: none;
    color: inherit;
  }
  </style>

  @yield('styles')
</head>
<body>
  <div class="d-flex">
    @auth
      <x-sidebar />
    @endauth

    {{-- Área principal --}}
   <div class="content-wrapper w-100 {{ (!isset($hideSidebar) || !$hideSidebar) ? 'with-sidebar' : '' }}">
    @auth
      <x-topbar :title="View::getSection('title') ?? 'Dashboard'" />
    @endauth
      {{-- Conteúdo --}}
      <main>
        @yield('content')
      </main>
    </div>
  </div>

  {{-- JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
