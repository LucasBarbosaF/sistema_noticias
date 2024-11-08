<?php

namespace App\Http\Controllers\Autenticacao;

use App\Exceptions\LoginException;
use App\Helpers\TokenHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Autenticacao\LoginRequest;
use App\Models\Usuario\UsuarioModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('autenticacao.index', [
            'titulo' => 'Login'
        ]);
    }

    public function logar(LoginRequest $request)
    {
        try {
            if (!$usuario = UsuarioModel::where('email', $request->email)->first()) {
                throw new LoginException('Email ou senha invalida');
            }

            if (!Hash::check($request->senha, $usuario->senha)) {
                throw new LoginException('Email ou senha invalida');
            }

            $token = TokenHelper::gerar(120, true, true, true, false);
            $usuario->_sessao = $token;
            $usuario->save();

            session()->put([
                '_sessao' => $token,
            ]);

            Auth::login($usuario);

            return redirect()->route('noticia.index')->with(['sucessos' => [
                'Login realizado com sucesso !'
            ]]);

        } catch (LoginException $e) {
            return redirect()->back()->withInput()->with(['erros' => [
                $e->getMessage()
            ]]);
        }
    }
}
