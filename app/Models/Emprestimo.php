<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    /** @use HasFactory<\Database\Factories\EmprestimoFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'livro_id',
        'aluno_id',
        'bibliotecario_id',
        'dh_emprestimo',
        'dh_devolucao',
    ];

    protected static function booted()
    {
        static::creating(function ($emprestimo) {
            $pendingCount = self::where('aluno_id', $emprestimo->aluno_id)
                ->whereNull('dh_devolucao')
                ->count();

            if ($pendingCount >= 5) {
                throw new \Exception('Este aluno já possui 5 ou mais empréstimos pendentes. Não é possível criar outro empréstimo.');
            }
        });
    }

    /**
     * Relationships
     */

    // Relacionamento com o modelo Livro
    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    // Relacionamento com o modelo Aluno
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    // Relacionamento com o modelo Bibliotecario
    public function bibliotecario()
    {
        return $this->belongsTo(Bibliotecario::class, 'bibliotecario_id');
    }
}
