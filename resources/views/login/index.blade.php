<x-loginlayout>
	<span class="login100-form-title p-b-43">
		<h2>Login</h2>
	</span>
		<div class="form-group">
			<label for="email">Endereço de E-mail</label>
			<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Coloque seu email" required>
		</div>
		<div class="form-group mt-2">
			<label for="password">Senha</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Coloque sua senha">
		</div>
		<div class="container-login100-form-btn mt-3">
			<button class="login100-form-btn mb-2">
				Entrar
			</button>
		</div>
	<a href="{{ route('users.create') }}" class="link-secondary">Não tem uma conta? Registre-se agora!</a>
</x-loginlayout>