<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Http\Requests\Noticia\CategoriaRequest;
use App\Models\Noticia;
use App\Models\Noticia\CategoriaModel;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{

    public function index()
    {
        // return view('categoria.index', [
        //     'titulo' => 'Categoria',
        // ]);
    }


    public function create()
    {
        return view('categoria.cadastrar', [
            'titulo' => 'Cadastrar Categoria',
        ]);
    }

    public function store(CategoriaRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $categoria = new CategoriaModel();
                $categoria->categoria = $request->categoria;
                $categoria->save();
            });
            return redirect()->route('noticia.index')->with('sucessos', ['Categoria cadastrada com sucesso!']);
        } catch (\Exception $e) {
            return back()->withInput()->with('erros', ['Erro ao cadastrar a Categoria. Tente novamente.']);
        }
    }

    public function edit(CategoriaModel $categoria)
    {
        // return view('categoria.atualizar', [
        //     'titulo' => 'Editar Categoria',
        //     'categoria' => $categoria,
        // ]);
    }

    public function update(CategoriaRequest $request, CategoriaModel $categoria)
    {
        // try {
        //     DB::transaction(function () use ($request, $categoria) {
        //         $categoria->categoria = $request->categoria;
        //         $categoria->save();
        //     });
        //     return redirect()->route('noticia.index')->with('sucessos', ['Categoria Atualizar com sucesso!']);
        // } catch (\Exception $e) {
        //     return back()->withInput()->with('erros', ['Erro ao atualizar a Categoria. Tente novamente.']);
        // }
    }

    public function show(Noticia\CategoriaModel $categoria)
    {
        // return view('categoria.visualizar', [
        //     'titulo' => $categoria->descricao,
        //     'categoria' => $categoria
        // ]);
    }
}
