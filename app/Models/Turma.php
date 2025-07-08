<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turmas'; // nome da tabela
    protected $fillable = [
        'nome',
        'ano_letivo',
        'serie',
        'turno',
        'professor_id',
        'created_at',
        'updated_at',
    ];

    public function professor(){
        return $this->belongsTo(Usuario::class, 'professor_id');
    }

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

}


