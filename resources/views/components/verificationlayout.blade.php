<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
  <head>
    <title>GAMELIST - Verificação</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
		@vite(['resources/js/app.js', 'resources/sass/app.scss'])
  </head>
  <body>
    <div class="modal modal-sheet d-block bg-dark p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">

        @php
            $verificationMessage = Session::get('verificationMessage');
        @endphp

        @isset($verificationMessage)
          <div class="alert alert-info">
              {{ $verificationMessage }}
          </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

          {{ $slot }}

    </div>
  </body>
</html>