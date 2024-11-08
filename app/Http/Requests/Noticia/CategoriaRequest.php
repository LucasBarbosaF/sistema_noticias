<?php

namespace App\Http\Requests\Noticia;

use App\Models\Noticia\CategoriaModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CategoriaRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'categoria' => 'required|string|max:255|unique:categorias',
        ];
    }

    public function messages()
    {
        return [
            'categoria.required' => 'O campo categoria é obrigatório.',
            'categoria.string' => 'O campo categoria deve ser uma string.',
            'categoria.max' => 'O campo categoria não pode exceder 255 caracteres.',
            'categoria.unique' => 'Categoria já cadastrada.'
        ];
    }
}
