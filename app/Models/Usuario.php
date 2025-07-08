<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use App\Models\Turma;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'funcao',
        'cpf',
        'email',
        'senha',
        'ativo',
    ];

    protected $hidden = [
        'senha', 'remember_token',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function getAuthPassword()
    {
        return $this->senha; // Laravel vai usar esse campo pra verificar o Hash
    }

    // User.php
    public function turmas(){
        return $this->hasMany(Turma::class, 'professor_id');
    }

}
