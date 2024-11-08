@extends('_layout._app')

@section('app_styles')
    <style>
        .container {
            max-width: 800px;
            margin: auto;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1.25rem;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-group .form-control,
        .form-group .form-select {
            border-radius: 6px;
        }

        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('app_content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Atualizar Notícia</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('noticia.update', $noticia->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo"
                                       class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}"
                                       value="{{ old('titulo') ?: $noticia->titulo }}" 
                                       placeholder="Digite o título da notícia" />
                                @error('titulo')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="categoria_id">Categoria</label>
                                <select name="categoria_id" id="categoria_id"
                                        class="form-select {{ $errors->has('categoria_id') ? 'is-invalid' : '' }}">
                                    <option disabled selected>Selecione uma categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            {{ (old('categoria_id') == $categoria->id || $noticia->categoria_id == $categoria->id) ? 'selected' : '' }}>
                                            {{ $categoria->categoria }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea name="descricao" id="descricao" rows="8"
                                          class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
                                          placeholder="Digite a descrição completa da notícia">{{ old('descricao') ?: $noticia->descricao }}</textarea>
                                @error('descricao')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
