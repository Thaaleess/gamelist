<!doctype html>
<html lang="pt-br" class="h-100" data-bs-theme="auto">
  <head><script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil de {{ $user->name }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/user_index.css') }}">

<style>
  @font-face {
    font-family: '8-bit Wonder';
    src: url('{{ asset('fonts/8-bitwonder.ttf') }}') format('truetype');
  }

  .name-limit {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 200px;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    width: 100%;
    height: 3rem;
    background-color: rgba(0, 0, 0, 0);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .btn-bd-primary {
    --bd-violet-bg: #712cf9;
    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-violet-bg);
    --bs-btn-border-color: var(--bd-violet-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #6528e0;
    --bs-btn-hover-border-color: #6528e0;
    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #5a23c8;
    --bs-btn-active-border-color: #5a23c8;
  }
  .bd-mode-toggle {
    z-index: 1500;
  }
</style>

</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('users.index') }}"><i class="fa-solid fa-gamepad"></i> GAMELIST</a>
        <div class="d-flex">
          <form class="w-100 me-3" role="search" action="{{ route('search.index') }}" method="GET">
            <input type="search" name="search" class="form-control" placeholder="Pesquisar..." aria-label="Search">
          </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Olá, <span class="name-limit">{{ $user->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-lg-start">
                  <li><a class="dropdown-item" href="{{ route('settings.index') }}"><i class="fa-solid fa-gear"></i> Configurações</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
  </nav>

  <main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-light" style="width: 220px;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item border-bottom text-center mb-2">
                <img src="{{ asset('storage/' . $user->user_image) }}" alt="Imagem do usuário" style="width: 100%" class="img-fluid rounded mb-2">
                <h5 class="name-limit">{{ $user->name }}</h5>
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

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>