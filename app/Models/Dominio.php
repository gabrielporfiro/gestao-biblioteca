<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dominio extends Model
{
    /** @use HasFactory<\Database\Factories\DominioFactory> */
    use HasFactory;

    protected $fillable = ['tp_dominio', 'nm_dominio', 'nr_ordem', 'nm_code'];

    protected $casts = [
        'id' => 'integer',
        'tp_dominio' => 'string',
        'nm_dominio' => 'string',
        'nr_ordem' => 'integer',
        'nm_code' => 'string',
    ];

    /**
     * Set the tp_dominio attribute in the correct format.
     */
    public function setTpDominioAttribute($value)
    {
        $this->attributes['tp_dominio'] = $this->formatTpDominio($value);
    }

    /**
     * Format tp_dominio to the correct format.
     *
     * @param string $value
     * @return string
     */
    protected function formatTpDominio(string $value): string
    {
        return Str::snake(Str::lower($value)); // Converts to lowercase and replaces spaces with underscores.
    }

    /**
     * Set the nm_code attribute automatically.
     */
    public function setNmDominioAttribute($value)
    {
        $this->attributes['nm_dominio'] = $value;
        $this->attributes['nm_code'] = $this->generateNmCode($value);
    }

    /**
     * Generate nm_code based on nm_dominio.
     *
     * @param string $value
     * @return string
     */
    protected function generateNmCode(string $value): string
    {
        return Str::slug($value); // Converts to lowercase, removes accents and special characters.
    }

    /**
     * Boot method to enforce nr_ordem rule.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->enforceOrder();
        });

        static::updating(function ($model) {
            $model->enforceOrder();
        });
    }

    /**
     * Enforce the nr_ordem rule.
     */
    protected function enforceOrder()
    {
        $maxOrder = self::where('tp_dominio', $this->tp_dominio)->max('nr_ordem');
        $this->nr_ordem = ($maxOrder ?? 0) + 1;
    }
}
