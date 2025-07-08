<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    protected $fillable = [
        'aluno_id', 'turma_id', 'professor_id', 'data', 'status'
    ];

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }

    public function turma() {
        return $this->belongsTo(Turma::class);
    }

    public function professor() {
        return $this->belongsTo(Usuario::class, 'professor_id');
    }
}
