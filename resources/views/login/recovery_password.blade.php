<x-verificationlayout>
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0 pb-4">
        <h1 class="modal-title fs-5">Recuperação de senha</h1>
        <a href="{{ route('login') }}" class="text-dark" type="button"><i class="fa-solid fa-arrow-left"></i></a>
      </div>
      <div class="modal-body py-0">
      <p class="text-secondary">Coloque o endereço de e-mail que você utilizou para criar sua conta. Um e-mail será enviado para uma nova senha ser salva.</p>
      <form class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0" action="#" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Endereço de E-mail</label>
          <input type="email" class="form-control" name="email" placeholder="Coloque seu email" required>
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Enviar e-mail de nova senha</button>
      </div>
      </form>
    </div>
  </div>
</x-verificationlayout>