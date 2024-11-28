<?php

use App\Http\Controllers\Admin\{DominiosController, UsersController};
use App\Http\Controllers\Aluno\LivrosController;
use App\Http\Controllers\Bibliotecario\{EstoqueLivroController, LivroController, EmprestimoController, AlunoController};
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin', 'role' => 'Admin'], function () {
        Route::resource('usuarios', UsersController::class);
        Route::resource('dominios', DominiosController::class);
    });
    Route::group(['prefix' => 'aluno', 'role' => 'Aluno'], function () {
        Route::resource('livros', LivrosController::class);
    });
    Route::group(['prefix' => 'bibliotecario', 'role' => 'Bibliotecario'], function () {
        Route::resource('alunos', AlunoController::class);
        Route::resource('livros', LivroController::class);
        Route::resource('estoque', EstoqueLivroController::class);
        Route::resource('emprestimos', EmprestimoController::class);
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
