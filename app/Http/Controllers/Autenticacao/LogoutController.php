<?php

namespace App\Http\Controllers\Autenticacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('noticia.index')->with(['sucessos' => [
            'Volte logo ! Sentiremos saudades !'
        ]]);
    }
}
