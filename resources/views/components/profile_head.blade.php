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
            <div class="d-flex justify-content-end p-4">
                <div class="bg-dark text-light rounded-4 shadow-sm px-4 py-3">
                    <p class="mb-1 fs-5">
                        👾 <strong>Jogos completos:</strong> 
                        <span class="badge rounded-pill text-bg-primary fs-6">{{ $totalJogosCompletos }}</span>
                    </p>
                    <p class="mb-1 fs-5">
                        🕹️ <strong>Jogos em andamento:</strong> 
                        <span class="badge rounded-pill text-bg-success fs-6">{{ $totalJogosAndamento }}</span>
                    </p>
                    <p class="mb-1 fs-5">
                        🎮 <strong>Jogos para zerar:</strong> 
                        <span class="badge rounded-pill text-bg-warning fs-6">{{ $totalJogosParaZerar }}</span>
                    </p>
                    <p class="mb-0 fs-5">
                        📋 <strong>Análises feitas:</strong> 
                        <span class="badge rounded-pill text-bg-info fs-6">{{ $totalAnalises }}</span>
                    </p>
                </div>
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
          <label for="name" class="form-label"><strong><h5>❤️ Jogos favoritos ( {{ $list->games->count() }} ):</h5></strong></label>
            @if ($list->games->isEmpty())
              <p class="text-center mt-4 mb-4">Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!</p>
            @else
            @foreach ($list->games->take(6) as $game)
              <div class="col-lg-2 text-center">
                <a href="{{ route('search.show', $game->id) }}"><img class="img-fluid rounded" src="{{ asset('storage/' . $game->game_image) }}" width="75%" alt=""></a>
                <h4 class="mt-2">{{ $game->name }}</h4>
              </div>
            @endforeach 
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
              <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos favoritos']) }}" role="button">Ver todos</a>
            </div>
          @endif
        @endif   
      @endforeach
      <hr style="width:75%">
    </div>
  </div>