<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.usuarios.index')->with('usuarios', User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.create')->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'roles' => 'required|nullable',
            ]);
            $user = User::create($request->all());
            if ($request->input('roles') !== null) {
                foreach ($request->input('roles') as $role) {
                    $user->assignRole($role);
                }
            }
            return redirect()->back()->with('success', 'Criado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.usuarios.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user)
    {
        $user = User::find($user);
        return view('admin.usuarios.edit')->with('user', $user)->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|confirmed',
            'roles' => 'required|nullable',
        ]);
        if ($request->input('password') === null) {
            $request->request->remove('password');
        }
        $user = User::find($id);
        $user->update($request->all());
        $user->roles()->detach();
        if ($request->input('roles') !== null) {
            foreach ($request->input('roles') as $role) {
                $user->assignRole($role);
            }
        }
        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user)
    {
        DB::beginTransaction();
        try {
            $user = User::find($user);
            $user->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao deletar');
        }
        return redirect()->back()->with('success', 'Deletado com sucesso');
    }
}
