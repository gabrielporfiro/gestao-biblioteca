<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Verifique a autorização aqui. Para o caso padrão, você pode permitir sempre:
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->route('aluno'),
            'password' => 'nullable|string|min:8|confirmed',  // Senha opcional para atualização
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validação para upload de imagem
            'telefone' => 'nullable|string|max:15',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'cep' => 'nullable|string|max:10',
            'pais' => 'nullable|string|max:255',
            'documento' => 'nullable|string|max:20',
            'observacao' => 'nullable|string|max:500',
            'faculdade_id' => 'nullable|exists:faculdades,id',  // Se for necessário o ID da faculdade
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Se o campo senha não foi preenchido, removemos ele da validação
        if (!$this->has('password')) {
            $this->request->remove('password');
        }
    }
}
