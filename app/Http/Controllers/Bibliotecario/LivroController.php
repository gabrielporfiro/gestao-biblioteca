<?php

namespace App\Http\Controllers\Bibliotecario;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Aluno;
use App\Models\Dominio;
use App\Models\EstoqueLivro;
use App\Models\Livro;
use App\Models\User;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bibliotecario.livro.index', [
            'livros' => Livro::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bibliotecario.livro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivroRequest $request)
    {
        Livro::create($request->validated());
        return redirect()->route('bibliotecario.livro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {

        return view('lbibliotecario.ivrosshow', [
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
        return view('bibliotecario.livro.edit', [
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
        return redirect()->route('bibliotecario.livro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('bibliotecario.livro.index');
    }

    public function emprestimo(Livro $livro)
    {
        // Obter o bibliotecário associado ao usuário autenticado
        $bibliotecario = auth()->user()->bibliotecario;

        // Buscar alunos associados à faculdade do bibliotecário
        $alunos = Aluno::where('faculdade_id', $bibliotecario->faculdade_id)->get();

        // Obter o estoque do livro, carregando o status de estoque com eager loading
        $estoque = EstoqueLivro::where('livro_id', $livro->id)
            ->with('statusEstoque')
            ->first();

        // Verificar se há estoque disponível
        if (!$estoque) {
            // Lógica para tratamento quando não houver estoque
            return redirect()->back()->with('error', 'Este livro não está disponível no estoque.');
        }

        return view('bibliotecario.livro.emprestimos.create', [
            'livro' => $livro,
            'alunos' => $alunos,
            'estoque' => $estoque,
        ]);
    }

    public function estoque(Livro $livro)
    {
        $estoques = EstoqueLivro::where('livro_id', $livro->id)
            ->with('statusEstoque')
            ->get();
        return view('bibliotecario.livro.estoque.create', [
            'livro' => $livro,
            'estoques' => $estoques,
        ]);
    }
}
