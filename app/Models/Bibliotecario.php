<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibliotecario extends Model
{
    /** @use HasFactory<\Database\Factories\BibliotecarioFactory> */
    use HasFactory;
    protected $fillable = [
        'faculdade_id',
        'user_id',
        'matricula',
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
