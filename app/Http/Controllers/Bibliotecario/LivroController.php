<?php

namespace App\Http\Controllers\Bibliotecario;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('livros.index', [
            'livros' => Livro::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivroRequest $request)
    {
        Livro::create($request->validated());
        return redirect()->route('livros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {

        return view('livros.show', [
            'livro' => $livro,
            'localizacao' => $livro->localizacao,
            'categoria' => $livro->categoriaLivro,
            'faculdade' => $livro->faculdade,
            'emprestimos' => $livro->emprestimos->sortByDesc('data_emprestimo'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        return view('livros.edit', [
            'livro' => $livro,
            'localizacao' => $livro->localizacao,
            'categoria' => $livro->categoriaLivro,
            'faculdade' => $livro->faculdade,
            'emprestimos' => $livro->emprestimos->sortByDesc('data_emprestimo'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        $livro->update($request->validated());
        return redirect()->route('livros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index');
    }
}
