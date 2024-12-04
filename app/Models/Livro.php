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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($livro) {
            $statusDomains = Dominio::where('tp_dominio', 'status_do_livro')->get();
            foreach ($statusDomains as $statusDomain) {
                EstoqueLivro::create([
                    'livro_id' => $livro->id,
                    'quantidade' => 0,
                    'status_estoque_id' => $statusDomain->id,
                ]);
            }
        });
    }

    public function categoriaLivro()
    {
        return $this->belongsTo(Dominio::class, 'categoria_livro_id');
    }

    public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'localizacao_id');
    }

    public function bibliotecario()
    {
        return $this->belongsTo(User::class, 'bibliotecario_id');
    }

    public function faculdade()
    {
        return $this->belongsTo(Dominio::class, 'faculdade_id');
    }

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
