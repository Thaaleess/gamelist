<x-userlayoutsidebar>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
        <div class="d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Todas as análises sobre o jogo {{ $games->name }}:</h2>
        </div>

        <div class="row" style="padding-bottom: 50px;">
            <div class="col-3">
                <div class="row text-center mb-2">
                    <a href="{{ route('search.show', $games->id) }}"><img src="{{ asset('storage/' . $games->game_image) }}" alt="Imagem do jogo" width="100%" class="img-fluid rounded"></a>
                    <label for="name" class="form-label mt-2"><strong>{{ $games->name }}</strong></label>
                </div>
                <div class="list-group">
                    <a href="{{ route('search.show', $games->id) }}" class="list-group-item list-group-item-action active" aria-current="true"><i class="fa-solid fa-house me-2"></i> Voltar a página do jogo</a>
                    <a href="{{ route('reviews.index') }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-chart-bar  me-2" width="16" height="16"></i> Minhas análises</a>
                </div>
            </div>
            <div class="col-9">
                <div class="row border border-start-0" style="padding-top: 20px;">
                    @if($reviews->isEmpty())
                        <p>Não há nenhuma análise sobre este jogo ainda. Faça uma agora!</p>
                    @else
                        @foreach($reviews as $rev)
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
                    @endif
                </div> 
                <div class="d-flex justify-content-center mt-4">
                    {{ $reviews->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </main>
</x-userlayoutsidebar>