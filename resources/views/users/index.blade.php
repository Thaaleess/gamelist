<x-userlayout title="Perfil do usuário">
  
  @include('components.profile_head')

  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-12 col-md-3 ps-md-5 mb-4">
        <div class="list-group shadow-sm">
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            <i class="bi bi-house"></i> Home
          </a>
          <a href="{{ route('lists.index', ['listName' => 'Jogos completados']) }}" class="list-group-item list-group-item-action">
            <i class="bi bi-check2-square"></i> Jogos completos
          </a>
          <a href="{{ route('lists.index', ['listName' => 'Jogos em andamento']) }}" class="list-group-item list-group-item-action">
            <i class="bi bi-joystick"></i> Jogos em andamento
          </a>
          <a href="{{ route('lists.index', ['listName' => 'Jogos que quero jogar']) }}" class="list-group-item list-group-item-action">
            <i class="bi bi-bookmark-plus"></i> Jogos que quero jogar
          </a>
          <a href="{{ route('lists.index', ['listName' => 'Jogos favoritos']) }}" class="list-group-item list-group-item-action">
            <i class="bi bi-suit-heart"></i> Jogos favoritos
          </a>
          <a href="{{ route('reviews.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-clipboard"></i> Análises feitas
          </a>
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="row justify-content-center mb-5">
          @foreach ($lists as $list)
            @if ($list->name === 'Jogos completados')
              <h5 class="fw-bold mb-3">👾 Jogos completados ( {{ $totalJogosCompletos }} )</h5>
              @if ($list->games->isEmpty())
                <p class="text-center mt-4 mb-4">
                  Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!
                </p>
              @else
                @foreach ($list->games->take(5) as $game)
                  <div class="col-lg-2 col-md-3 col-sm-4 text-center mb-4">
                    <a href="{{ route('search.show', $game->id) }}">
                      <img class="img-fluid rounded shadow-sm" src="{{ asset('storage/' . $game->game_image) }}" width="80%" alt="">
                    </a>
                    <h6 class="mt-2">{{ $game->name }}</h6>
                  </div>
                @endforeach
                <div class="d-flex justify-content-end mb-4">
                  <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos completados']) }}">
                    Ver todos
                  </a>
                </div>
              @endif
            @endif
          @endforeach
          <hr style="width:75%">
        </div>
        <div class="row justify-content-center mb-5">
          @foreach ($lists as $list)
            @if ($list->name === 'Jogos em andamento')
              <h5 class="fw-bold mb-3">🕹️ Jogos em andamento ( {{ $totalJogosAndamento }} )</h5>
              @if ($list->games->isEmpty())
                <p class="text-center mt-4 mb-4">Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!</p>
              @else
                @foreach ($list->games->take(5) as $game)
                  <div class="col-lg-2 col-md-3 col-sm-4 text-center mb-4">
                    <a href="{{ route('search.show', $game->id) }}">
                      <img class="img-fluid rounded shadow-sm" src="{{ asset('storage/' . $game->game_image) }}" width="80%" alt="">
                    </a>
                    <h6 class="mt-2">{{ $game->name }}</h6>
                  </div>
                @endforeach
                <div class="d-flex justify-content-end mb-4">
                  <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos em andamento']) }}">
                    Ver todos
                  </a>
                </div>
              @endif
            @endif
          @endforeach
          <hr style="width:75%">
        </div>
        <div class="row justify-content-center mb-5">
          @foreach ($lists as $list)
            @if ($list->name === 'Jogos que quero jogar')
              <h5 class="fw-bold mb-3">🎮 Jogos para zerar ( {{ $totalJogosParaZerar }} )</h5>
              @if ($list->games->isEmpty())
                <p class="text-center mt-4 mb-4">Você ainda não tem nenhum jogo adicionado. Busque um jogo e adicione ele aqui!</p>
              @else
                @foreach ($list->games->take(5) as $game)
                  <div class="col-lg-2 col-md-3 col-sm-4 text-center mb-4">
                    <a href="{{ route('search.show', $game->id) }}">
                      <img class="img-fluid rounded shadow-sm" src="{{ asset('storage/' . $game->game_image) }}" width="80%" alt="">
                    </a>
                    <h6 class="mt-2">{{ $game->name }}</h6>
                  </div>
                @endforeach
                <div class="d-flex justify-content-end mb-4">
                  <a class="btn btn-outline-success btn-sm" href="{{ route('lists.index', ['listName' => 'Jogos que quero jogar']) }}">
                    Ver todos
                  </a>
                </div>
              @endif
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-layout>