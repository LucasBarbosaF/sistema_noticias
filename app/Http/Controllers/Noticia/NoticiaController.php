<?php

namespace App\Http\Controllers\Noticia;

use App\Http\Controllers\Controller;
use App\Http\Requests\Noticia\NoticiaRequest;
use App\Models\Noticia;
use App\Models\Noticia\CategoriaModel;
use App\Models\Noticia\NoticiaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;
        $noticias = Noticia\NoticiaModel::when($search, function ($query, $search) {
            return $query->where('titulo', 'like', '%' . $search . '%')
                ->orWhere('descricao', 'like', '%' . $search . '%')
                ->orWhereHas('categoria', function ($query) use ($search) {
                    $query->where('categoria', 'like', '%' . $search . '%');
                });
        })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('noticia.index', [
            'titulo' => 'Noticias',
            'noticias' => $noticias,
        ]);
    }


    public function create()
    {
        return view('noticia.cadastrar', [
            'titulo' => 'Cadastrar Noticia',
            'categorias' => CategoriaModel::orderBy('categoria', 'desc')->get()
        ]);
    }

    public function store(NoticiaRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $noticia = new NoticiaModel();
                $noticia->titulo = $request->titulo;
                $noticia->descricao = $request->descricao;
                $noticia->categoria_id = $request->categoria_id;
                $noticia->usuario_id = auth()->user()->id;
                $noticia->save();
            });
            return redirect()->route('noticia.index')->with('sucessos', ['Noticia cadastrada com sucesso!']);
        } catch (\Exception $e) {
            return back()->withInput()->with('erros', ['Erro ao cadastrar a noticia. Tente novamente.']);
        }
    }

    public function edit(NoticiaModel $noticia)
    {
        return view('noticia.atualizar', [
            'titulo' => 'Editar Noticia',
            'noticia' => $noticia,
            'categorias' => CategoriaModel::orderBy('categoria', 'desc')->get()
        ]);
    }

    public function update(NoticiaRequest $request, NoticiaModel $noticia)
    {
        try {
            DB::transaction(function () use ($request, $noticia) {
                $noticia->titulo = $request->titulo;
                $noticia->descricao = $request->descricao;
                $noticia->categoria_id = $request->categoria_id;
                $noticia->usuario_id = auth()->user()->id;
                $noticia->save();
            });
            return redirect()->route('noticia.index')->with('sucessos', ['Noticia Atualizar com sucesso!']);
        } catch (\Exception $e) {
            return back()->withInput()->with('erros', ['Erro ao atualizar a noticia. Tente novamente.']);
        }
    }

    public function show(Noticia\NoticiaModel $noticia)
    {
        return view('noticia.visualizar', [
            'titulo' => $noticia->descricao,
            'noticia' => $noticia
        ]);
    }
}
