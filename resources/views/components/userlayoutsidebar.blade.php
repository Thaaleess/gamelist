<!doctype html>
<html lang="pt-br" class="h-100" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GAMELIST - Perfil de {{ $user->name }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/user_index.css') }}">

<style>
  
  @font-face {
    font-family: '8-bit Wonder';
    src: url('{{ asset('fonts/8-bitwonder.ttf') }}') format('truetype');
  }

</style>

</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('users.index') }}"><i class="fa-solid fa-gamepad"></i> GAMELIST</a>
    
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
          <form class="d-flex ms-3" role="search" action="{{ route('search.index') }}" method="GET">
            <div class="input-group">
              <input type="search" name="search" class="form-control" placeholder="Pesquisar" aria-label="Search" style="width: 400px;">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <ul class="navbar-nav ms-3">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Olá, {{ $user->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-lg-start">
                <li><a class="dropdown-item" href="{{ route('settings.index') }}"><i class="fa-solid fa-gear"></i> Configurações</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-light" style="width: 220px;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item border-bottom text-center">
              <div class="square-image-container-sidebar">
                <img src="{{ asset($user->user_image) }}" alt="Imagem do usuário" class="square-image-sidebar rounded mb-2">
              </div>      
                <h5 class="name-limit mt-2">{{ $user->name }}</h5>
            </li>
            <li class="nav-item">
                <a href="{{ route('lists.index', ['listName' => 'Jogos completados']) }}" class="nav-link text-primary">
                <i class="fa-solid fa-check me-2" width="16" height="16"></i> Jogos completos
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('lists.index', ['listName' => 'Jogos em andamento']) }}" class="nav-link text-primary">
                <i class="fa-solid fa-bars-progress me-2" width="16" height="16"></i> Jogos em andamento
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('lists.index', ['listName' => 'Jogos que quero jogar']) }}" class="nav-link text-primary">
                <i class="fa-solid fa-list me-2" width="16" height="16"></i> Jogos para zerar
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('lists.index', ['listName' => 'Jogos favoritos']) }}" class="nav-link text-primary">
                <i class="fa-solid fa-star me-2" width="16" height="16"></i> Jogos favoritos
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('reviews.index') }}" class="nav-link text-primary">
              <i class="fa-solid fa-chart-bar me-2" width="16" height="16"></i> Análises feitas
              </a>
            </li>
        </ul>
    </div>
    <div class="b-example-divider b-example-vr"></div>

    {{ $slot }}

    <script src="{{ asset('js/users/users.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>