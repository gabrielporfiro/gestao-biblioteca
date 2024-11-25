<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'estante_id',
        'fileira_id',
        'prateleira_id',
    ];

    /**
     * Relationships
     */

    // Relacionamento com o modelo de Domínio para Estante
    public function estante()
    {
        return $this->belongsTo(Dominio::class, 'estante_id');
    }

    // Relacionamento com o modelo de Domínio para Fileira
    public function fileira()
    {
        return $this->belongsTo(Dominio::class, 'fileira_id');
    }

    // Relacionamento com o modelo de Domínio para Prateleira
    public function prateleira()
    {
        return $this->belongsTo(Dominio::class, 'prateleira_id');
    }
}
