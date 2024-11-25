<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculdade extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
    ];

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
