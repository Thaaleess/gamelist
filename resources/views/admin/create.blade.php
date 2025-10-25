<x-adminlayout title="Cadastrar novo jogo">
    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col-6">
                <label for="name" class="form-label">Nome do jogo:</label>
                <input autofocus type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="col-4">
                <label for="developer" class="form-label">Desenvolvedora:</label>
                <input type="text" id="developer" name="developer" class="form-control" value="{{ old('developer') }}" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-10">
                <label for="description" class="form-label">Descrição do jogo:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-3">
                <label for="genre" class="form-label">Gênero:</label>
                <input type="text" id="genre" name="genre" class="form-control" value="{{ old('genre') }}" required>
            </div>
            <div class="col-4">
                <label for="game_image" class="form-label">Imagem do jogo:</label>
                <input type="file" id="game_image" name="game_image" class="form-control" accept="image/jpeg, image/png">
            </div>
            <div class="col-3">
                <label for="release_date" class="form-label">Data de lançamento:</label>
                <input type="date" id="release_date" name="release_date" class="form-control" value="{{ old('release_date') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-3"><i class="bi bi-plus-lg"></i> Adicionar</button>
    </form>
</x-adminlayout>