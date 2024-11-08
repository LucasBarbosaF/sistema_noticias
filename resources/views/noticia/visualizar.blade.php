@extends('_layout._app')

@section('app_content')
    <div class="container mt-5">
        <div class="card shadow-lg rounded">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center p-4">
                <h4 class="mb-0">
                    {{ $noticia->categoria->categoria }} - {{ $noticia->titulo }}
                </h4>
                @if (Auth()->check())
                    <a href="{{ route('noticia.atualizar', $noticia->id) }}" class="btn btn-light btn-sm px-4">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                @endif
            </div>
            <div class="card-body">
                <p class="card-text" style="line-height: 1.6; font-size: 1.1rem;">
                    {{ $noticia->descricao }}
                </p>
            </div>
        </div>
    </div>
@endsection
