<x-adminlayout title="Admin - Visualizando o jogo '{!! $games->name !!}'">

    <div class="row">
        <div class="col-3">
            <label for="name" class="form-label"><strong>Capa do jogo:</strong></label>
            @if ($games->game_image === null)
                <p>Sem imagem</p>
            @else
                <img src="{{ asset('storage/' . $games->game_image) }}" alt="Imagem do jogo" style="width: 100%" class="img-fluid rounded">
            @endif
        </div>
        <div class="col-8">
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
            <span class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.edit', $games->id) }}" class="btn btn-primary ms-1"><i class="fa-solid fa-pencil"></i></a>
                <form action="{{ route('admin.destroy', $games->id) }}" method="post" class="ms-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </span>
        </div>
    </div>
</x-adminlayout>