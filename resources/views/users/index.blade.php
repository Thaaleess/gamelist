<x-userlayout title="Perfil do usuário">
  <main>
    <div class="p-4 mb-3 rounded">
      <div class="container-fluid py-5 h-100 p-5 text-bg-dark rounded-3 row">
        <div class="row">
          <div class="col-md-2">
            <div class="square-image-container">
              <img src="{{ asset($user->user_image) }}" alt="Imagem do usuário" class="square-image rounded mb-2">
            </div>
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
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="container">
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
    </div>
</x-layout>