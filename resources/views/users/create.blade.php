<x-loginlayout>
	<a href="{{ route('login') }}" class="text-dark" type="button" style="text-decoration:none"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
	<span class="login-form-title p-b-15 p-t-10">
		<h2>Cadastrar</h2>
	</span>
		<form method="POST">
			@csrf
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
			<div class="container-login-form-btn mt-3">
				<button class="login-form-btn mb-1">
					Registrar
				</button>
			</div>
		</form>
		<a href="{{ route('login') }}" class="link-secondary">Já tem uma conta? Entre agora!</a>
</x-loginlayout>