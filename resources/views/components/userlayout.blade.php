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
            src: url('/fonts/8-bitwonder.TTF') format('truetype');
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
    
    {{ $slot }}
    
      <script src="{{ asset('js/users/users.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>