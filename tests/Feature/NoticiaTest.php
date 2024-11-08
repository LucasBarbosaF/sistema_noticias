<?php

namespace Tests\Feature;

use App\Models\Noticia\CategoriaModel;
use App\Models\Noticia\NoticiaModel;
use App\Models\Usuario\UsuarioModel;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class NoticiaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_exemplo(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_mostre_uma_lista_de_categorias()
    {
        $categoria = CategoriaModel::firstOrCreate([
            'categoria' => 'Testando Categoria'
        ]);
        NoticiaModel::firstOrCreate([
            'titulo' => 'Teste',
            'descricao' => 'teste',
            'categoria_id' => $categoria->id,
        ]);

        $response = $this->get(route('noticia.index'));

        $response->assertStatus(200);
        $response->assertViewHas('noticias', function ($noticias) {
            return $noticias instanceof \Illuminate\Pagination\LengthAwarePaginator;
        });
    }

    public function test_busca_noticia()
    {
        $categoria = CategoriaModel::firstOrCreate([
            'categoria' => 'Testando Categoria'
        ]);
        $noticia = NoticiaModel::firstOrCreate([
            'titulo' => 'Notícia importante',
            'descricao' => "Notíca teste importante",
            'categoria_id' => $categoria->id,
        ]);


        $response = $this->get(route('noticia.index', ['search' => 'importante']));

        $response->assertStatus(200);
        $response->assertSee('Notícia importante');
    }

    public function test_cadastra_noticia()
    {
        $categoria = CategoriaModel::firstOrCreate([
            'categoria' => 'Testando Categoria'
        ]);
        $user = UsuarioModel::firstOrCreate(
            [
                'nome' => 'Lucas Barbosa',
                'email' => 'lucass_br@hotmail.com'
            ],
            [
                'senha' => Hash::make('123456')
            ]
        );

        $this->actingAs($user);

        $data = [
            'titulo' => 'Nova Notícia',
            'descricao' => 'Descrição da nova notícia',
            'categoria_id' => $categoria->id,
        ];

        $response = $this->post(route('noticia.store'), $data);

        $response->assertRedirect(route('noticia.index'));
        $this->assertDatabaseHas('noticias', ['titulo' => 'Nova Notícia']);
    }
}
