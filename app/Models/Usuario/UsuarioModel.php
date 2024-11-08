<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsuarioModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['nome', 'email','senha',];

    protected $hidden = ['senha', '_sessao',];

    protected $table = 'usuarios';

}
