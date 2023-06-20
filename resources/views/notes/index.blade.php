<x-userlayoutsidebar>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
        <div class="d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Seus lembretes do jogo {{ $games->name }}:</h2>
        </div>
            @if (Session::has('mensagem.sucesso'))
                <div class="alert alert-success">
                    {{ Session::get('mensagem.sucesso') }}
                </div>
            @endif
        <div class="row">
            <div class="col-3">
                <div class="row text-center mb-2">
                    <a href="{{ route('search.show', $games->id) }}"><img src="{{ asset('storage/' . $games->game_image) }}" alt="Imagem do jogo" width="100%" class="img-fluid rounded"></a>
                    <label for="name" class="form-label mt-2"><strong>{{ $games->name }}</strong></label>
                </div>
                <div class="list-group">
                    <a href="{{ route('search.show', $games->id) }}" class="list-group-item list-group-item-action active" aria-current="true"><i class="fa-solid fa-house me-2"></i> Voltar a página do jogo</a>
                    <a href="{{ route('reviews.index') }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-chart-bar  me-2" width="16" height="16"></i> Minhas análises</a>
                    <a href="{{ route('notes.index', $games->id) }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-note-sticky  me-2" width="16" height="16"></i> Lembretes deste jogo</a>
                </div>
            </div>
            <div class="col-9">
                <form action="{{ route('notes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $games->id }}">
                    <label for="note">Faça um lembrete para o jogo {{ $games->name }}:</label>
                    <textarea class="form-control mt-2" name="note" placeholder="Escreva uma anotação para você mesmo" style="height: 100px" required></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                </form>
                <p style="padding-top: 30px"><strong>Seus lembretes sobre este jogo:</strong></p>
                @if ($notes->isEmpty())
                <p>Você não tem nenhum lembrete deste jogo.</p>
                @else
                @foreach ($notes as $reminder)             
                        <form action="{{ route('notes.update', $reminder->id) }}" method="POST">
                        <textarea class="form-control mt-2 @if (!$reminder->editable) locked @endif" name="note" id="noteText{{ $reminder->id }}" placeholder="Escreva uma anotação para você mesmo" style="height: 100px" readonly required>{{ $reminder->note }}</textarea>
                            <span class="d-flex justify-content-between mt-1" style="padding-bottom: 30px">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        </form>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary btn-sm editBtn" data-textarea-id="noteText{{ $reminder->id }}"><i class="fa-solid fa-pencil"></i></button>
                            <form action="{{ route('notes.destroy', $reminder->id) }}" method="POST" class="ms-1">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </span>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {{ $notes->onEachSide(1)->links() }}
                </div>
                @endif
            </div>
        </div>
    </main>
    <style>
        .locked {
            background-color: #f2f2f2;
            cursor: not-allowed;
        }
    </style>
    <script>
        const editButtons = document.querySelectorAll('.editBtn');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const textareaId = this.getAttribute('data-textarea-id');
                const textarea = document.getElementById(textareaId);
                textarea.readOnly = !textarea.readOnly;
                textarea.classList.toggle('locked');
            });
        });
    </script>
</x-userlayoutsidebar>