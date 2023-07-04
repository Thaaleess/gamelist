<x-verificationlayout>
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Verifique o seu e-mail</h1>
        <a href="{{ route('login') }}" class="text-dark" type="button"><i class="fa-solid fa-arrow-left"></i></a>
      </div>
      <div class="modal-body py-0">
        <p class="text-dark">Uma verificação foi enviada para o seu endereço de e-mail. Acesse seu e-mail e verifique a sua conta para acessar a plataforma.</p>
        <p class="text-secondary">Caso a verificação não tenha sido enviada, você pode reenviar o e-mail clicando no botão abaixo.</p>
      </div>
      <form class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0" action="{{ route('verification.resend', $user->id) }}" method="GET">
          @csrf
          <button type="submit" class="btn btn-lg btn-primary">Reenviar E-mail</button>
      </form>
    </div>
  </div>
</x-verificationlayout>