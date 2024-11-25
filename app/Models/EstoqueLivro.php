<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueLivro extends Model
{
    /** @use HasFactory<\Database\Factories\EstoqueLivroFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'livro_id',
        'quantidade',
        'status_estoque_id',
    ];

    /**
     * Relationships
     */

    // Relacionamento com o modelo Livro
    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    // Relacionamento com o modelo Dominio para status do estoque
    public function statusEstoque()
    {
        return $this->belongsTo(Dominio::class, 'status_estoque_id');
    }
}
