<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Livro::query();

        if ($request->has('search')) {
            $query->where('titulo', 'like', '%' . $request->search . '%')
                ->orWhere('observacao', 'like', '%' . $request->search . '%');
        }

        $livros = $query->paginate(9);

        return view('aluno.livros.index', compact('livros'));
    }

    public function show(Livro $livro)
    {
        return view('livros.show', [
            'livro' => $livro,
        ]);
    }
}
