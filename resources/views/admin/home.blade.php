<x-layout title="Admin - Painel de Controle">

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

</x-layout>        