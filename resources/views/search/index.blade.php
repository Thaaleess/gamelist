<x-userlayoutsidebar>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">Resultados da pesquisa</h2>
            </div>

            <div class="row">
                @if ($results->isEmpty())
                    <p>Nenhum resultado encontrado.</p>
                @else
                  <div class="col-11">
                      <div class="row">
                              @foreach ($results as $result)
                                  <div class="col-lg-2 text-center">
                                      <a href="{{ route('search.show', $result->id) }}"><img src="{{ asset('storage/' . $result->game_image) }}" alt="Imagem do jogo" width="100%" class="img-fluid rounded"></a>
                                      <h6 class="mt-2">{{ $result->name }}</h6>
                                  </div>
                              @endforeach
                              <div class="d-flex justify-content-center mt-4">
                                {{ $results->links() }}
                            </div>
                      </div>
                  </div>
                @endif
            </div>
        </main>
    </main>
</x-userlayoutsidebar>