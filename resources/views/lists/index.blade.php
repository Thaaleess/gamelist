<x-userlayoutsidebar>
  <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">{{ $listName }}</h2>
    </div>

    @if (Session::has('mensagem.sucesso'))
      <div class="alert alert-success">
          {{ Session::get('mensagem.sucesso') }}
      </div>
    @endif
    <div class="row">
      @if ($games->isEmpty())
          <p>Nenhum resultado encontrado.</p>
      @else
        <div class="col-11">
            <div class="row">
                    @foreach ($games as $game)
                        <div class="col-lg-2 text-center mb-2">
                            <div class="game-item">
                                <div class="image-wrapper">
                                    <a href="{{ route('search.show', $game->id) }}">
                                        <img src="{{ asset('storage/' . $game->game_image) }}" alt="Imagem do jogo" width="100%" class="img-fluid rounded">
                                    </a>
                                    <form action="{{ route('lists.removeGame', [$listId, $game->id]) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-button"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                                <h6 class="mt-2">{{ $game->name }}</h6>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
          {{ $games->links() }}
        </div>
      @endif
  </div>
</main>
    <style>
        .game-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-wrapper {
            position: relative;
        }

        .image-wrapper img {
            transition: opacity 0.3s;
        }

        .image-wrapper:hover img {
            opacity: 0.7;
        }

        .delete-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .game-item:hover .delete-form {
            opacity: 1;
            pointer-events: auto;
        }

        .delete-button {
            margin-top: 10px;
        }
    </style>
</x-userlayoutsidebar>