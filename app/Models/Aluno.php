<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nome_pai',
        'nome_mae',
        'cpf',
        'matricula',
        'email_edu',
        'sexo',
        'data_nascimento',
        'telefone_responsavel',
        'endereco',
        'turma_id',
        'status',
        'foto',
    ];

    // Relação com Turma
    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    // // Exemplo: ocorrências, notas, etc.
    // public function ocorrencias()
    // {
    //     return $this->hasMany(Ocorrencia::class);
    // }
}
