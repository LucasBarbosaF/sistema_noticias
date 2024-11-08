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

        .form-group .form-control {
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
                <h4>Cadastrar Categoria</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('categoria.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label for="categoria" class="form-label">Categoria</label>
                                <input 
                                    type="text" 
                                    name="categoria" 
                                    id="categoria" 
                                    class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}" 
                                    value="{{ old('categoria') }}" 
                                    placeholder="Digite o nome da categoria" 
                                />
                                @error('categoria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-primary mt-3 px-4">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
