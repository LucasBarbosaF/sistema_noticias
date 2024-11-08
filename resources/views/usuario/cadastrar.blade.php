@extends('_layout._app')

@section('app_styles')
    <style>
        .body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
@endsection


@section('app_content')
    <div class="body">
        <div class="login-container">
            @if (session()->has('erros'))
                @foreach (session('erros') as $aviso)
                    <div class="alert alert-danger" role="alert">
                        {{ $aviso }}
                    </div>
                @endforeach
            @endif
            @if (session()->has('sucessos'))
                @foreach (session('sucessos') as $aviso)
                    <div class="alert alert-success" role="alert">
                        {{ $aviso }}
                    </div>
                @endforeach
            @endif
            <h2 class="text-center">Cadastro</h2>
            <form action="{{ route('usuario.cadastrar') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome"
                        name="nome" placeholder="Digite seu nome" required autocomplete="off"
                        value="{{ old('nome') }}">
                    @error('nome')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        id="email" name="email" placeholder="Digite seu e-mail" required autocomplete="off"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control {{ $errors->has('senha') ? 'is-invalid' : '' }}"
                        id="senha" name="senha" placeholder="Digite sua senha" required autocomplete="off">
                    @error('senha')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="senha_confirmation">Confirme a Senha</label>
                    <input type="password"
                        class="form-control {{ $errors->has('senha_confirmation') ? 'is-invalid' : '' }}"
                        id="senha_confirmation" name="senha_confirmation" placeholder="Confirme sua senha" required
                        autocomplete="off">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="{{ route('autenticacao.login.index') }}" class="btn btn-secondary">Já tenho uma conta</a>
                </div>
            </form>
        </div>
    </div>
@endsection
