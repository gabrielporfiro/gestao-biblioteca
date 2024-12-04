<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\{DominiosController, UsersController};
use App\Http\Controllers\Aluno\LivrosController;
use App\Http\Controllers\Bibliotecario\{EstoqueLivroController, LivroController, EmprestimoController, AlunoController};
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'role:Admin'], function () {
        Route::resource('usuarios', UsersController::class);
        Route::resource('dominios', DominiosController::class);
    });
    Route::group(['prefix' => 'aluno', 'middleware' => 'role:Aluno'], function () {
        Route::resource('livros', LivrosController::class);
    });
    Route::group(['prefix' => 'bibliotecario', 'middleware' => 'role:Bibliotecario'], function () {
        Route::resource('alunos', AlunoController::class);
        Route::resource('livro', LivroController::class);
        Route::get('livro/{livro}/emprestimo', [LivroController::class, 'emprestimo'])->name('livro.emprestimo');
        Route::get('livro/{livro}/estoque', [LivroController::class, 'estoque'])->name('livro.estoque');
    });
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
