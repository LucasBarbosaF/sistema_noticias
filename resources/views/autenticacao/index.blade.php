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
            <h2 class="text-center">Login</h2>
            <form action="{{ route('autenticacao.login.logar') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Digite seu e-mail" required autocomplete="off">
                    @error('email')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control @error('senha') is-invalid @enderror" id="senha"
                        name="senha" placeholder="Digite sua senha" required autocomplete="off">
                    @error('senha')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <a href="{{ route('usuario.index') }}" type="button" class="btn btn-secondary">Cadastrar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
