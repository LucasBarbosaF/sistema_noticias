<?php

namespace App\Http\Requests\Autenticacao;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'senha' => 'required'
        ];
    }

    public function messages()
    {
        $messages = parent::messages();
        $messages['email.required'] = 'E-mail é obrigatorio';
        $messages['email.mail'] = 'Digite um e-mail valido';
        $messages['senha.required'] = 'Senha é obrigatorio';

        return $messages;
    }
}
