<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <title>GAMELIST</title>

		<link rel="stylesheet" href="{{ asset('css/app.css') }}">

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
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>