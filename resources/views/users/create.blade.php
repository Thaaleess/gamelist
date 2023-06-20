<x-loginlayout>
	<span class="login100-form-title p-b-43">
		<h2>Cadastrar</h2>
	</span>
		<div class="form-group">
			<label for="name">Nome</label>
			<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Coloque seu nome" required>
		</div>

		<div class="form-group mt-2">
			<label for="email">Endereço de E-mail</label>
			<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Coloque seu email" required>
		</div>

		<div class="form-group mt-2">
			<label for="password">Senha</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Coloque sua senha" required>
		</div>

		<div class="form-group mt-2">
			<label for="password_confirmation">Confirme sua senha</label>
			<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha" required>
		</div>
		<div class="container-login100-form-btn mt-3">
			<button class="login100-form-btn mb-2">
				Registrar
			</button>
		</div>
		<a href="{{ route('login') }}" class="link-secondary">Já tem uma conta? Entre agora!</a>
</x-loginlayout>