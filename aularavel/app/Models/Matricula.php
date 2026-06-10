<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'disciplina_id',
        'aluno_id',
    ];

    public function disciplina() {
        return $this->belongsTo(Disciplina::class);
    }

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }
}
