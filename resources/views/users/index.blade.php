<x-userlayout title="Perfil do usuário">
  <main>
    <div class="p-4 mb-3 bg-body-tertiary rounded">
      <div class="container-fluid py-5 h-100 p-5 text-bg-dark rounded-3 row">
        <div class="row">
          <div class="col-md-2">
            {{-- <img src="{{ asset('storage/userdefault.jpg') }}" alt="Imagem do usuário" style="height: 150px" class="img-fluid rounded"> --}}
            <img src="{{ asset('storage/' . $user->user_image) }}" alt="Imagem do usuário" style="width: 100%" class="img-fluid rounded">
            {{-- <svg class="{{ asset('storage/' . $user->user_image) }}" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> --}}
          </div>
          <div class="col-md-10">
            <h1 class="display-5 fw-bold">{{ $user->name }}</h1>
            <div class="d-flex justify-content-end p-6">
                <p class="mb-0">
                Jogos completos: <span class="badge rounder-pill text-bg-primary">{{ $totalJogosCompletos }}</span><br class="d-none d-sm-block">
                Jogos em andamento: <span class="badge rounder-pill text-bg-success">{{ $totalJogosAndamento }}</span><br class="d-none d-sm-block">
                Jogos para zerar: <span class="badge rounder-pill text-bg-warning">{{ $totalJogosParaZerar }}</span><br class="d-none d-sm-block">
                Análises feitas: <span class="badge rounder-pill text-bg-info">{{ $totalAnalises }}</span><br class="d-none d-sm-block">
                </p>
            </div>
            {{-- <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p> --}}
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row justify-content-center">
    @foreach ($lists as $list)
      @if ($list->name === 'Jogos favoritos')
        <label for="name" class="form-label"><strong><h5>Jogos favoritos ({{ $list->games->count() }}):</h5></strong></label>
        @if ($list->games->isEmpty())
          <p class="text-center mt-4 mb-4">Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!</p>
        @else
        @foreach ($list->games->take(6) as $game)
          <div class="col-lg-2 text-center">
            <a href="{{ route('search.show', $game->id) }}"><img class="img-fluid rounded" src="{{ asset('storage/' . $game->game_image) }}" width="75%" alt=""></a>
            <h4 class="mt-2">{{ $game->name }}</h4>
          </div>
        @endforeach 
        <div class="d-grid gap-2 d-md-flex mt-3 justify-content-md-end">
          <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos favoritos']) }}" role="button">Ver todos</a>
        </div>
        @endif
      @endif   
    @endforeach
  </div>

<div class="row" style="margin-top: 60px">
  <div class="col-3">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active" aria-current="true"><i class="fa-solid fa-house me-2"></i> Home</a>
      <a href="{{ route('lists.index', ['listName' => 'Jogos completados']) }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-check  me-2" width="16" height="16"></i> Jogos completos</a>
      <a href="{{ route('lists.index', ['listName' => 'Jogos em andamento']) }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-bars-progress  me-2" width="16" height="16"></i> Jogos em andamento</a>
      <a href="{{ route('lists.index', ['listName' => 'Jogos que quero jogar']) }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-list me-2" width="16" height="16"></i> Jogos que quero jogar</a>
      <a href="{{ route('lists.index', ['listName' => 'Jogos favoritos']) }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-star  me-2" width="16" height="16"></i> Jogos favoritos</a>
      <a href="{{ route('reviews.index') }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-chart-bar  me-2" width="16" height="16"></i> Análises feitas</a>
    </div>
  </div>
  <div class="col-9">
    <div class="row justify-content-center">
      
        @foreach ($lists as $list)
        @if ($list->name === 'Jogos completados')
        <label for="name" class="form-label"><strong><h5>Jogos completados ({{ $totalJogosCompletos }}):</h5></strong></label>
          @if ($list->games->isEmpty())
            <p class="text-center mt-4 mb-4">Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!</p>
          @else
          @foreach ($list->games->take(5) as $game)
            <div class="col-lg-2 text-center">
              <a href="{{ route('search.show', $game->id) }}"><img class="img-fluid rounded" src="{{ asset('storage/' . $game->game_image) }}" width="80%" alt=""></a>
              <h6 class="mt-2">{{ $game->name }}</h6>
            </div>
          @endforeach 
          <div class="d-grid gap-2 d-md-flex mt-3 justify-content-md-end">
            <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos completados']) }}" role="button">Ver todos</a>
          </div>
          @endif
        @endif   
      @endforeach
    </div>
    <div class="row justify-content-center" style="margin-top: 60px">
      @foreach ($lists as $list)
      @if ($list->name === 'Jogos em andamento')
      <label for="name" class="form-label"><strong><h5>Jogos em andamento ({{ $totalJogosAndamento }}):</h5></strong></label>
        @if ($list->games->isEmpty())
          <p class="text-center mt-4 mb-4">Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!</p>
        @else
        @foreach ($list->games->take(5) as $game)
          <div class="col-lg-2 text-center">
            <a href="{{ route('search.show', $game->id) }}"><img class="img-fluid rounded" src="{{ asset('storage/' . $game->game_image) }}" width="80%" alt=""></a>
            <h6 class="mt-2">{{ $game->name }}</h6>
          </div>
        @endforeach 
        <div class="d-grid gap-2 d-md-flex mt-3 justify-content-md-end">
          <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos em andamento']) }}" role="button">Ver todos</a>
        </div>
        @endif
      @endif   
    @endforeach
    </div>
    <div class="row justify-content-center" style="margin-top: 60px; margin-bottom: 80px">
      @foreach ($lists as $list)
      @if ($list->name === 'Jogos que quero jogar')
      <label for="name" class="form-label"><strong><h5>Jogos para zerar ({{ $totalJogosParaZerar }}):</h5></strong></label>
        @if ($list->games->isEmpty())
          <p class="text-center mt-4 mb-4">Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!</p>
        @else
        @foreach ($list->games->take(5) as $game)
          <div class="col-lg-2 text-center">
            <a href="{{ route('search.show', $game->id) }}"><img class="img-fluid rounded" src="{{ asset('storage/' . $game->game_image) }}" width="80%" alt=""></a>
            <h6 class="mt-2">{{ $game->name }}</h6>
          </div>
        @endforeach 
        <div class="d-grid gap-2 d-md-flex mt-3 justify-content-md-end">
          <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos que quero jogar']) }}" role="button">Ver todos</a>
        </div>
        @endif
      @endif   
    @endforeach
    </div>
  </div>
</div>

{{--   <main class="d-flex flex-nowrap mt-5">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 220px;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="#" class="nav-link text-info ">
                <i class="fa-solid fa-list me-2" width="16" height="16"></i> Jogos completados
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-info">
                <i class="fa-solid fa-list me-2" width="16" height="16"></i> Jogos em andamento
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-info">
                <i class="fa-solid fa-list me-2" width="16" height="16"></i> Jogos para zerar
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-info">
                <i class="fa-solid fa-list me-2" width="16" height="16"></i> Jogos favoritos
                </a>
            </li>
        </ul>
    </div>
    <div class="b-example-divider b-example-vr"></div>
  </main> --}}
{{--   <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-body-secondary">It’ll blow your mind.</span></h2>
      <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-body-secondary">See for yourself.</span></h2>
      <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
    </div>
    <div class="col-md-5 order-md-1">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
      <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>
  </div>

  <hr class="featurette-divider"> --}}

    </div>
</x-layout>