@extends('_layout._app')

@section('app_content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($noticias as $noticia)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <span>
                                {{ $noticia->categoria->categoria }} - {{ $noticia->titulo }}
                            </span>
                        </div>
                        <div class="card-body">
                            <p class="text-muted" style="font-size: 0.9rem;">
                                {{ Str::limit($noticia->descricao, 100) }}
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('noticia.show', $noticia->id) }}" class="btn btn-outline-primary">
                                Acessar Notícia
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $noticias->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
