<x-layout title="Editar Jogo '{!! $games->name !!}'">
         <form action="{{ route('admin.update', $games->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="row mb-3">
                <div class=col-8>
                    <label for="name" class="form-label">Nome do jogo:</label>
                    <input autofocus type="text" id="name" name="name" class="form-control" @isset($games->name) value="{{ $games->name }}" @endisset>
                </div>
                <div class=col-4>
                    <label for="developer" class="form-label">Desenvolvedora:</label>
                    <input type="text" id="developer" name="developer" class="form-control" @isset($games->developer) value="{{ $games->developer }}" @endisset>
                </div>
            </div>
            <div class="row mb-3">
                <div>
                    <label for="description" class="form-label">Descrição do jogo:</label>
                    <textarea id="description" name="description" class="form-control" rows="4">@isset($games->description){{ $games->description }}@endisset</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class=col-4>
                    <label for="genre" class="form-label">Gênero:</label>
                    <input type="text" id="genre" name="genre" class="form-control" @isset($games->genre) value="{{ $games->genre }}" @endisset>
                </div>
                <div class=col-4>
                    <label for="game_image" class="form-label">Imagem do jogo:</label>
                    <input type="file" class="form-control-file" id="game_image" name="game_image">
                </div>
                <div class=col-4>
                    <label for="release_date" class="form-label">Data de lançamento:</label>
                    <input type="date" id="release_date" name="release_date" class="form-control" @isset($games->release_date) value="{{ $games->release_date }}" @endisset>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
</x-layout>