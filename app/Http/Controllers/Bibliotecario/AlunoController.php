<?php

namespace App\Http\Controllers\Bibliotecario;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use App\Models\Dominio;
use App\Models\Faculdade;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bibliotecario.alunos.index')->with('alunos', Aluno::with('user')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bibliotecario.alunos.create')->with('faculdades', Faculdade::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlunoRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create($request->all());
            $user->aluno()->create($request->all());
            DB::commit();
            return redirect()->route('bibliotecario.alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('bibliotecario.alunos.index')->with('error', 'Erro ao cadastrar aluno!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $aluno)
    {
        $aluno = Aluno::with('user')
            ->with('faculdade')
            ->where('id', $aluno)->first();
        return view('bibliotecario.alunos.show')->with('aluno', $aluno);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $aluno)
    {
        $aluno = Aluno::with('user')
            ->where('id', $aluno)->first();
        $faculdades = Faculdade::all();
        return view('bibliotecario.alunos.edit')->with('aluno', $aluno)->with('faculdades', $faculdades);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlunoRequest $request, string $aluno)
    {
        try {
            DB::beginTransaction();
            $aluno = Aluno::with('user')->findOrFail($aluno);
            if ($request->hasFile('imagem')) {
                $request->validate([
                    'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imagemPath = $request->file('imagem')->store('public/alunos');
                $aluno->imagem = basename($imagemPath);
            }
            $aluno->user->update($request->only(['name', 'email', 'password']));
            $aluno->update($request->except(['name', 'email', 'password', 'imagem']));
            DB::commit();
            return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('alunos.index')->with('error', 'Erro ao atualizar aluno!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $aluno)
    {
        try {
            DB::beginTransaction();
            $aluno = Aluno::with('user')
                ->where('id', $aluno)->first();
            $aluno->delete();
            $aluno->user->delete();
            DB::commit();
            return redirect()->route('bibliotecario.alunos.index')->with('success', 'Aluno excluído com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('bibliotecario.alunos.index')->with('error', 'Erro ao excluir aluno!');
        }
    }
}
