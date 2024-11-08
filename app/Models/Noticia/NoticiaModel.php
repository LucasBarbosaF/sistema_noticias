<?php

namespace App\Models\Noticia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NoticiaModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['titulo', 'descricao', 'visualizacao'];

    protected $hidden = ['usuario_id', 'categoria_id'];

    protected $table = 'noticias';

    public function categoria()
    {
        return $this->hasOne(CategoriaModel::class, 'id', 'categoria_id');
    }

}
