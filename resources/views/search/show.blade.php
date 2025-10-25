<x-userlayoutsidebar>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
        <div class="d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
            @if (Session::has('mensagem.sucesso'))
                <div class="alert alert-success">
                    {{ Session::get('mensagem.sucesso') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-3">
                <label for="name" class="form-label"><strong>📀 Capa do jogo:</strong></label>
                <img src="{{ asset('storage/' . $games->game_image) }}" alt="Imagem do jogo" width="100%" class="img-fluid rounded">
                @if ($savedLists->isEmpty())
                    <p class="mt-2"><strong>Este jogo já está incluído em todas as suas listas disponíveis.</strong></p>
                @else
                    <form action="{{ route('lists.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="games_id" value="{{ $games->id }}">

                        <div class="d-flex gap-2 align-items-stretch">
                            <div class="form-floating flex-grow-1">
                                <select class="form-select" id="floatingSelect" name="lists_id" required>
                                    <option value="" selected disabled>Selecione uma opção</option>
                                    @foreach($savedLists as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Adicione o jogo em uma lista</label>
                            </div>
                            <button type="submit" class="btn btn-success px-4"><i class="bi bi-check-lg"></i></button>
                        </div>
                    </form>
                @endif
            </div>

                <div class="col-8 mb-2">
                    <label for="name" class="form-label mt-2"><strong>Nome do jogo:</strong></label>
                    <span>{{ $games->name }}</span><br>
                    <label for="developer" class="form-label mt-2"><strong>Desenvolvedora:</strong></label>
                    <span>{{ $games->developer }}</span><br>
                    <label for="description" class="form-label mt-2"><strong>Descrição do jogo:</strong></label>
                    <span>{{ $games->description }}</span><br>
                    <label for="genre" class="form-label mt-2"><strong>Gênero do jogo:</strong></label>
                    <span>{{ $games->genre }}</span><br>
                    <label for="description" class="form-label mt-2"><strong>Data de lançamento:</strong></label>
                    @if ($games->release_date === null)
                    <p>A ser anunciado</p>
                    @else
                    <span>{{ $games->release_date }}</span>
                    @endif
                </div>
            </div>
    <hr>
    <div class="row" style="padding-bottom: 60px">
        <div class="col-3">
          <div class="list-group">
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action active" aria-current="true"><i class="bi bi-house"></i> Home</a>
            <a href="{{ route('reviews.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-clipboard"></i> Todas as minhas análises</a>
            <a href="{{ route('notes.index', $games->id) }}" class="list-group-item list-group-item-action"><i class="bi bi-card-list"></i> Lembretes deste jogo</a>
          </div>
        </div>
        <div class="col-9">
            @if ($userReviews->isEmpty())
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="game_id" value="{{ $games->id }}">
                <label for="review">Faça uma análise do jogo {{ $games->name }}:</label>
                <textarea class="form-control mt-2" name="review" placeholder="Escreva uma análise" style="height: 150px"></textarea>
                <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-plus-lg"></i> Adicionar análise</button>
            </form>
            @else
                @foreach ($userReviews as $userRev)
                    <p><strong>Sua análise sobre o jogo {{ $games->name }}:</strong></p>
                    <form action="{{ route('reviews.update', $userRev->id) }}" method="POST">
                        <textarea class="form-control mt-2 @if (!$userRev->editable) locked @endif" name="review" id="reviewText{{ $userRev->id }}" placeholder="Escreva uma análise" style="height: 150px" readonly required>{{ $userRev->review }}</textarea>
                        <span class="d-flex justify-content-between mt-2">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-check-lg"></i> Salvar alterações</button>
                    </form>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm editBtn" data-textarea-id="reviewText{{ $userRev->id }}"><i class="bi bi-pencil"></i></button>
                        <form action="{{ route('reviews.destroy', $userRev->id) }}" method="POST" class="ms-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </span>
                @endforeach
            @endif
            <hr>
            <h4>Análises sobre o jogo '{{ $games->name }}':</h4>
            <div class="row" style="padding-bottom: 60px; padding-top: 10px;">
                @if($reviews->isEmpty())
                    <p>Não há nenhuma análise sobre este jogo ainda. Faça uma agora!</p>
                @else
                    @foreach($reviews->take(5) as $rev)
                        <div class="col-2 d-flex flex-column align-items-center" style="padding-bottom: 20px;">
                            <div class="square-image-container">
                                <img src="{{ asset($rev->user->user_image) }}" alt="Imagem do usuário" class="square-image rounded mb-2">
                            </div>       
                            <h6 class="name-limit mt-1">{{ $rev->user->name }}</h6>
                        </div>
                        <div class="col-10">
                            <p>{{ $rev->review }}</p>
                        </div>
                    @endforeach
                    <form action="{{ route('reviews.show_reviews', $games->id) }}">
                        <span class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Ver todas as análises deste jogo</button>
                        </span>
                    </form>
                @endif
            </div>    
        </div>
    </div>
</main>
</x-userlayoutsidebar>