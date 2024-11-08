<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\UsuarioRequest;
use App\Models\Usuario\UsuarioModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        return view('usuario.cadastrar', [
            'titulo' => 'Cadastrar'
        ]);
    }


    public function store(UsuarioRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $usuario = new UsuarioModel();
                $usuario->nome = $request->nome;
                $usuario->email = $request->email;
                $usuario->senha = Hash::make($request->senha);
                $usuario->save();
            });
            return redirect()->route('autenticacao.login.index')->with('sucessos', ['Usuário cadastrado com sucesso!']);
        } catch (\Exception $e) {
            return back()->withInput()->with('erros', ['Erro ao cadastrar o usuário. Tente novamente.']);
        }
    }
}
