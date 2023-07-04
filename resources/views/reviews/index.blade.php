<x-userlayoutsidebar>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Minhas análises:</h2>
        </div>

        @if (Session::has('mensagem.sucesso'))
            <div class="alert alert-success">
                {{ Session::get('mensagem.sucesso') }}
            </div>
        @endif

        @if ($reviews->isEmpty())
            <p>Você ainda não tem nenhuma análise feita.</p>
        @else
            @foreach ($reviews as $rev)
            <div class="row">
                <div class="col-2 text-center">
                    <a href="{{ route('search.show', $rev->games->id) }}"><img src="{{ asset('storage/' . $rev->games->game_image) }}" alt="Imagem do jogo" width="100%" class="img-fluid rounded"></a>
                    <label for="name" class="form-label mt-2"><strong>{{ $rev->games->name }}</strong></label>
                </div>
                <div class="col-10">
                    <p><strong>Sua análise sobre o jogo {{ $rev->games->name }}:</strong></p>
                    <form action="{{ route('reviews.update', $rev->id) }}" method="POST">
                    <textarea class="form-control mt-2 @if (!$rev->editable) locked @endif" name="review" id="reviewText{{ $rev->id }}" placeholder="Escreva uma análise" style="height: 150px" readonly required>{{ $rev->review }}</textarea>
                        <span class="d-flex justify-content-between mt-1" style="padding-bottom: 100px">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    </form>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm editBtn" data-textarea-id="reviewText{{ $rev->id }}"><i class="fa-solid fa-pencil"></i></button>
                        <form action="{{ route('reviews.destroy', $rev->id) }}" method="POST" class="ms-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </span>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $reviews->links() }}
            </div>
        @endif
    </main>
</x-userlayoutsidebar>