<?php

namespace App\Http\Controllers;

use App\Models\Faculdade;
use App\Http\Requests\StoreFaculdadeRequest;
use App\Http\Requests\UpdateFaculdadeRequest;

class FaculdadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('faculdades.index', [
            'faculdades' => Faculdade::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculdades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaculdadeRequest $request)
    {
        Faculdade::create($request->validated());
        return redirect()->route('faculdades.index')->with('status', 'Faculdade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculdade $faculdade)
    {
        return view('faculdades.show', [
            'faculdade' => $faculdade,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculdade $faculdade)
    {
        return view('faculdades.edit', [
            'faculdade' => $faculdade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaculdadeRequest $request, Faculdade $faculdade)
    {
        $faculdade->update($request->validated());
        return redirect()->route('faculdades.index')->with('status', 'Faculdade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculdade $faculdade)
    {
        $faculdade->delete();
        return redirect()->route('faculdades.index')->with('status', 'Faculdade deletada com sucesso!');
    }
}
