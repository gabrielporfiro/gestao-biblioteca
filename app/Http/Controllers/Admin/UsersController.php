<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Bibliotecario;
use App\Models\Faculdade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.usuarios.index')->with('usuarios', User::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.create')->with('roles', Role::all())->with('faculdades', Faculdade::all());
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $role = $request->input('roles')[0] ?? '';

            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'roles' => 'required|array',
                // Campos para Aluno
                'matricula' => $role === 'Aluno' ? 'string|required' : 'nullable',
                'telefone' => $role === 'Aluno' ? 'string|nullable' : 'nullable',
                'endereco' => $role === 'Aluno' ? 'string|nullable' : 'nullable',
                'cidade' => $role === 'Aluno' ? 'string|nullable' : 'nullable',
                'estado' => $role === 'Aluno' ? 'string|nullable' : 'nullable',
                'cep' => $role === 'Aluno' ? 'string|nullable' : 'nullable',
                'pais' => $role === 'Aluno' ? 'string|nullable' : 'nullable',
                // Campos para Bibliotecário
                'faculdade_id' => $role === 'Bibliotecario' ? 'required|exists:faculdades,id' : 'nullable',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                dd($validator->errors()->toArray(), $request->all());
            }

            $validatedData = $validator->validated();

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);
            $user->assignRole($role);
            if ($role === 'Aluno') {
                Aluno::create([
                    'user_id' => $user->id,
                    'matricula' => $validatedData['matricula'],
                    'telefone' => $validatedData['telefone'],
                    'endereco' => $validatedData['endereco'],
                    'cidade' => $validatedData['cidade'],
                    'estado' => $validatedData['estado'],
                    'cep' => $validatedData['cep'],
                    'pais' => $validatedData['pais'],
                ]);
            } elseif ($role === 'Bibliotecario') {
                Bibliotecario::create([
                    'user_id' => $user->id,
                    'faculdade_id' => $validatedData['faculdade_id'],
                    'matricula' => $validatedData['matricula'],
                ]);
            }
            DB::commit();
            return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
        } catch (Exception $e) {
            DB::rollBack();
            \Log::error('Erro ao criar usuário: ' . $e->getMessage());
            return redirect()->route('usuarios.index')->with('error', 'Ocorreu um erro ao criar o usuário. Tente novamente.');
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
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            // Verifique se o usuário está tentando excluir a si mesmo
            if (auth()->id() === $user->id) {
                return redirect()->route('usuarios.index')->with('error', 'Você não pode excluir a si mesmo.');
            }

            // Não permita excluir o usuário Admin
            if ($user->hasRole('Admin')) {
                return redirect()->route('usuarios.index')->with('error', 'Não é permitido excluir um administrador.');
            }

            // Excluir Aluno relacionado, se existir
            if ($user->hasRole('Aluno')) {
                $aluno = $user->aluno()->first();
                if ($aluno) {
                    $aluno->delete();
                }
            }

            // Excluir Bibliotecário relacionado, se existir
            if ($user->hasRole('Bibliotecario')) {
                $bibliotecario = $user->bibliotecario()->first();
                if ($bibliotecario) {
                    $bibliotecario->delete();
                }
            }

            // Remover as permissões associadas e excluir o usuário
            $user->roles()->detach(); // Remover todas as roles associadas
            $user->delete(); // Excluir o usuário

            return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado!');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Não foi possível excluir o usuário. Erro: ' . $e->getMessage());
        }
    }
}
