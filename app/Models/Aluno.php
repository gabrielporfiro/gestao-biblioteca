<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    /** @use HasFactory<\Database\Factories\AlunoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matricula',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'pais',
        'documento',
        'imagem',
        'observacao',
        'faculdade_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faculdade()
    {
        return $this->belongsTo(Faculdade::class);
    }
}
