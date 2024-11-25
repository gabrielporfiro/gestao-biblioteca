<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    /** @use HasFactory<\Database\Factories\LivroFactory> */
    use HasFactory;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'codigo',
        'autor',
        'editora',
        'edicao',
        'ano',
        'imagem',
        'pdf',
        'observacao',
        'categoria_livro_id',
        'localizacao_id',
        'bibliotecario_id',
        'faculdade_id',
    ];

    /**
     * Relationships
     */

    // Relacionamento com o modelo Dominio para Categoria do Livro
    public function categoriaLivro()
    {
        return $this->belongsTo(Dominio::class, 'categoria_livro_id');
    }

    // Relacionamento com o modelo Localizacao
    public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'localizacao_id');
    }

    // Relacionamento com o modelo User para Bibliotecário
    public function bibliotecario()
    {
        return $this->belongsTo(User::class, 'bibliotecario_id');
    }

    // Relacionamento com o modelo Dominio para Faculdade
    public function faculdade()
    {
        return $this->belongsTo(Dominio::class, 'faculdade_id');
    }

    // Relacionamento com o modelo Emprestimo
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
