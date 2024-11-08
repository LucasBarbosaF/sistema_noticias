<?php

namespace Database\Seeders;

use App\Models\Noticia\CategoriaModel;
use App\Models\Noticia\NoticiaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiaSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriaEsporte = CategoriaModel::firstOrCreate([
            'categoria' => 'Esportes'
        ]);

        $categoriaPolicia = CategoriaModel::firstOrCreate([
            'categoria' => 'Policia'
        ]);

        NoticiaModel::firstOrCreate([
            'titulo' => 'Clássico dos Gigantes',
            'descricao' => 'O confronto entre os maiores rivais do esporte promete ser um espetáculo imperdível,
             com jogadores altamente preparados e torcidas ansiosas por um show de habilidade e paixão.
             Saiba tudo sobre as escalações, o histórico de rivalidade entre os times, e o que os especialistas
             estão dizendo sobre as estratégias que cada equipe deve adotar. Fique por dentro das expectativas,
             das possíveis surpresas e de como esse clássico pode influenciar a temporada. 
             Prepare-se para um jogo cheio de emoção e disputa acirrada!',
             'categoria_id' => $categoriaEsporte->id
        ]);

        NoticiaModel::firstOrCreate([
            'titulo' => 'Corrida contra o Tempo',
            'descricao' => 'Atletas de todo o mundo se preparam para quebrar barreiras e superar limites nas principais
             competições de atletismo. Descubra os detalhes dos recordes a serem desafiados, os atletas que prometem
             surpreender e o impacto que essas conquistas podem ter no esporte.',
             'categoria_id' => $categoriaEsporte->id
        ]);

        NoticiaModel::firstOrCreate([
            'titulo' => 'Operação Nacional: Forças de Segurança Unificadas para Combater o Crime Organizado',
            'descricao' => 'Diversas forças policiais de todo o país se uniram em uma grande operação para 
             desmantelar redes de crime organizado. Saiba tudo sobre as estratégias de combate,
             os avanços já conquistados e os desafios enfrentados pelas autoridades na luta pela 
             segurança pública.',
             'categoria_id' => $categoriaPolicia->id
        ]);
    }
}
