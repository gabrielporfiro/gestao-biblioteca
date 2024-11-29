<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dominio;
use Illuminate\Http\Request;

class DominiosController extends Controller
{
    public function index()
    {
        return view('admin.dominios.index')->with('dominios', Dominio::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.dominios.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nm_dominio' => 'required',
                'tp_dominio' => 'required',
            ]);
            Dominio::create($request->all());
            return redirect()->back()->with('success', 'Criado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar');
        }
    }

    public function show($id)
    {
        $dominio = Dominio::find($id);
        return view('admin.dominios.show')->with('dominio', $dominio);
    }

    public function edit($id)
    {
        $dominio = Dominio::find($id);
        return view('admin.dominios.edit')->with('dominio', $dominio);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nm_dominio' => 'required',
                'tp_dominio' => 'required',
            ]);
            $dominio = Dominio::find($id);
            $dominio->update($request->all());
            return redirect()->back()->with('success', 'Atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar');
        }
    }

    public function destroy($id)
    {
        try {
            $dominio = Dominio::find($id);
            $dominio->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao deletar');
        }
    }
}
