<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
  </head>

<body> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.home') }}"><i class="fa-solid fa-gamepad"></i> GAMELIST</a>
        <div class="d-flex">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Olá, {{ $user->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-lg-start">
                  <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
  </nav>

  <main class="d-flex flex-nowrap">  
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 220px;">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{ route('admin.home') }}" class="nav-link active" aria-current="page">
            <i class="fa-solid fa-house me-2"></i>
            Home
          </a>
        </li>
        <li>
          <a href="{{ route('admin.index') }}" class="nav-link text-white">
            <i class="fa-solid fa-list me-2"></i> Lista de jogos
          </a>
        </li>
        <li>
          <a href="{{ route('admin.create') }}" class="nav-link text-white">
            <i class="fa-solid fa-plus me-2"></i> Adicionar jogo
          </a>
        </li>
      </ul>
    </div>
    <div class="b-example-divider b-example-vr"></div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2 class="h2">{{ $title }}</h2>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      {{ $slot }}

    </main>
  </main>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>