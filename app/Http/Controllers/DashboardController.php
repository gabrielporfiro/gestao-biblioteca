<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        $emprestimos = Emprestimo::where('aluno_id', auth()->user()->id)
            ->whereNull('dh_devolucao')  // Apenas empréstimos sem data de devolução
            ->with('livro')
            ->orderBy('dh_emprestimo', 'desc')
            ->paginate(5);
        return view('dashboard')->with('emprestimos', $emprestimos);
    }
}
