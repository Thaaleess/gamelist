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
            <a class="nav-link" href="{{ route('settings.changePhoto') }}">Foto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('settings.changePassword') }}">Mudar senha</a>
          </li>
        </ul>
  
        <form action="{{ route('settings.updatePassword') }}" class="form-control mt-2" method="POST">
            @csrf
            <h2 class="mb-2">Mudar a senha da conta</h2>
              <div class="form-group col-6 mt-3">
                <label for="email">Endereço de E-mail</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Coloque seu email" disabled>
              </div>
              <div class="form-group col-6 mt-4">
                <label for="current_password">Senha atual</label>
                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Coloque sua senha atual" required>
              </div>
              <div class="form-group col-6 mt-3">
                <label for="password">Nova senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Coloque sua nova senha" required>
              </div>
              <div class="form-group col-6 mt-2">
                <label for="password_confirmation">Confirmar a nova senha</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme a nova senha" required>
              </div>
            <button type="submit" class="btn btn-primary btn-lg mt-4">Salvar</button>
          </form>
    </main>
  </x-userlayoutsidebar>