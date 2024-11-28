<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.usuarios.index');
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('admin.usuarios.show');
    }

    public function edit($id)
    {
        return view('admin.usuarios.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
