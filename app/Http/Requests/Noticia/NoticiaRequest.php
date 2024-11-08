<?php

namespace App\Http\Requests\Noticia;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|integer|exists:categorias,id'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.string' => 'O campo título deve ser uma string.',
            'titulo.max' => 'O campo título não pode exceder 255 caracteres.',

            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'O campo descrição deve ser uma string.',

            'categoria.required' => 'O campo descrição é obrigatório.',

            'categoria_id.required' => 'O campo categoria é obrigatório.',
            'categoria_id.integer' => 'O campo categoria deve ser um número inteiro.',
            'categoria_id.exists' => 'A categoria selecionada é inválida.',
        ];
    }
}
