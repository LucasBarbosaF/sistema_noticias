<?php

namespace App\Models\Noticia;

use App\Models\Noticia\NoticiaModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CategoriaModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['categoria'];

    protected $table = 'categorias';

    public function noticias()
    {
        return $this->hasMany(NoticiaModel::class, 'categoria_id', 'id');
    }

}
