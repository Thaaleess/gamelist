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
        <div class="alert alert-danger">
            {{ Session::get('mensagem.fracasso') }}
        </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account-tab-pane" type="button" role="tab" aria-controls="account-tab-pane" aria-selected="true">Conta</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="photo-tab" data-bs-toggle="tab" data-bs-target="#photo-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Foto</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Mudar senha</button>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="account-tab-pane" role="tabpanel" aria-labelledby="account-tab">
            <form action="{{ route('settings.updateName') }}" class="form-control mt-2" method="POST">
            @csrf
            <h2 class="mb-2">Mudar nome de usuário</h2>
            <div class="form-group col-6 mt-3">
              <label for="name">Nome de usuário</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}" aria-describedby="nameHelp" placeholder="Coloque o novo nome" required>
            </div>
            <div class="form-group col-6 mt-3">
              <label for="email">Endereço de E-mail</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Coloque seu email" disabled>
            </div>
            <button class="btn btn-primary btn-lg mt-4">Salvar</button>
            </form>
          </div>
          <div class="tab-pane fade" id="photo-tab-pane" role="tabpanel" aria-labelledby="photo-tab">
              <form action="{{ route('settings.updatePhoto') }}" class="form-control mt-2" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="mb-2">Mudar a foto de perfil</h2>
                <div class="p-4 bg-body-tertiary rounded">
                  <div class="py-5 h-100 p-5 text-bg-dark rounded-3">
                    <div class="row">
                      <div class="col-md-3">
                        <img src="{{ asset('storage/' . $user->user_image) }}" alt="Imagem do usuário" style="width: 100%" class="img-fluid rounded mb-2">
                      </div>
                      <div class="col-md-9">
                        <label for="formFile" class="form-label">Escolha uma foto para usar de imagem de perfil</label>
                        <input class="form-control" type="file" id="user_image" name="user_image" accept="image/jpeg, image/png">
                      </div>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary btn-lg">Salvar</button>
              </form>
          </div>
          <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab">
            <form action="{{ route('settings.updatePassword') }}" class="form-control mt-2" method="POST">
              @csrf
              <h2 class="mb-2">Mudar a senha da conta</h2>
                <div class="form-group col-6 mt-3">
                  <label for="email">Endereço de E-mail</label>
                  <input type="email" class="form-control" value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Coloque seu email" disabled>
                </div>
                <div class="form-group col-6 mt-4">
                  <label for="current_password">Senha atual</label>
                  <input type="password" class="form-control" name="current_password" placeholder="Coloque sua senha atual" required>
                </div>
                <div class="form-group col-6 mt-3">
                  <label for="password">Nova senha</label>
                  <input type="password" class="form-control" name="password"placeholder="Coloque sua nova senha" required>
                </div>
                <div class="form-group col-6 mt-2">
                  <label for="password_confirmation">Confirmar a nova senha</label>
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme a nova senha" required>
                </div>
              <button class="btn btn-primary btn-lg mt-4">Salvar</button>
            </form>
          </div>
        </div>
    </main>
</x-userlayoutsidebar>