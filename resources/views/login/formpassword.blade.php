<x-verificationlayout>
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header border-bottom-0">
          <h1 class="modal-title fs-5">Redefina sua senha</h1>
          <a href="{{ route('login') }}" class="text-dark" type="button"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="modal-body py-0">
        <form class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div class="form-group">
                <label for="password">Nova senha</label>
                <input type="password" class="form-control mt-1" name="password" placeholder="Coloque sua nova senha" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirme sua senha</label>
                <input type="password" class="form-control mt-1" name="password_confirmation" placeholder="Confirme sua senha" required>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Enviar e-mail de nova senha</button>
            </div>
            </form>
      </div>
    </div>
  </x-verificationlayout>