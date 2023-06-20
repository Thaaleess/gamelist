<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>GAMELIST - Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/login/login.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/login/size.css') }}">

		<style>
			@font-face {
				font-family: '8-bit Wonder';
                src: url(' {{ asset('fonts/8-bitwonder.ttf') }} ') format('truetype');
			}
		</style>
	</head>
	<body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="post">
                        @csrf
    
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

                        <div class="text-center p-t-30 p-b-15">
                            <span class="txt2">
                                ou se conecte usando
                            </span>
                        </div>
                        <div class="login100-form-social flex-c-m">
                            <a href="{{ url('gamelist/auth/google') }}" class="login100-form-social-item flex-c-m bg1 m-r-5">
                                <i class="fa-brands fa-google" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
                    <div class="login100-more" style="background-image: url('{{ asset('images/gamelist.png') }}');"></div>	
                </div>
            </div>
        </div>
        
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>