<x-adminlayout title="Admin - Lista de Jogos Cadastrados">

    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset
    
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="85%">Nome</th>
                    <th scope="col" width="15%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->name }}</td>
                        <td>
                            <span class="d-flex">
                                <a href="{{ route('admin.show', $game->id) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.edit', $game->id) }}" class="btn btn-primary btn-sm ms-1"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('admin.destroy', $game->id) }}" method="post" class="ms-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{ $games->links() }}
        </div>
    </div>
</x-adminlayout>        