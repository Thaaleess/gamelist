<x-userlayoutsidebar>
    <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2 class="h2">Configurações</h2>
      </div>
      @if (Session::has('mensagem.sucesso'))
        <div class="alert alert-success">
            {{ Session::get('mensagem.sucesso') }}
        </div>
      @endif
      @if (Session::has('mensagem.fracasso'))
        <div class="alert alert-info">
            {{ Session::get('mensagem.fracasso') }}
        </div>
      @endif
  
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.index') }}">Conta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('settings.changePhoto') }}">Foto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.changePassword') }}">Mudar senha</a>
          </li>
        </ul>
  
        <form action="" class="form-control mt-2" method="POST">
            @csrf
            <h2 class="mb-2">Mudar a foto de perfil</h2>
            <div class="p-4 bg-body-tertiary rounded">
              <div class="container-fluid py-5 h-100 p-5 text-bg-dark rounded-3 row">
                <div class="row">
                  <div class="col-md-3">
                    <img src="{{ asset($user->user_image) }}" alt="Imagem do usuário" style="width: 100%" class="img-fluid rounded mb-2">
                  </div>
                  <div class="col-md-9">
                    <label for="formFile" class="form-label">Escolha uma foto para usar de imagem de perfil</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-lg">Salvar</button>
          </form>
        </main>
  </x-userlayoutsidebar>