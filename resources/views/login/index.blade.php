<x-loginlayout>
	<span class="login-form-title p-b-40">
		<h2>Login</h2>
	</span>
	<form method="POST">
		@csrf
			<div class="form-group">
				<label for="email">Endereço de E-mail</label>
				<input type="email" class="form-control" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Coloque seu email" required>
			</div>
			<div class="form-group mt-2">
				<label for="password">Senha</label>
				<input type="password" class="form-control" name="password" placeholder="Coloque sua senha">
			</div>
			<div class="container-login-form-btn mt-3">
				<button class="login-form-btn mb-1">
					Entrar
				</button>
			</div>	
		</form>
		<a href="{{ route('password.email') }}" class="link-secondary">Esqueceu sua senha?</a>
		<hr>
		<p class="text-secondary text-center">Não tem uma conta? Registre-se agora!</p>
		<form action="{{ route('users.create') }}">
			<div class="container-login-form-btn">
				<button class="login-form-btn mb-1">
					Registrar
				</button>
			</div>
		</form>
</x-loginlayout>