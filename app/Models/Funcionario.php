<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    // Tabela associada (opcional, se não seguir o padrão Laravel de nome pluralizado)
    protected $table = 'funcionarios';

    // Campos que podem ser atribuídos em massa
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone',
        'cargo',
        'data_admissao',
        'status',
        // adicione mais conforme necessário
    ];

    // Tipagem automática de colunas para datas
    protected $dates = [
        'data_admissao',
        'created_at',
        'updated_at',
    ];

    // Exemplo de relacionamento (se aplicável)
    public function turma()
    {
        return $this->hasMany(Turma::class);
    }
}
