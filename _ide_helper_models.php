<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $matricula
 * @property string|null $telefone
 * @property string|null $endereco
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $cep
 * @property string|null $pais
 * @property string|null $documento
 * @property string|null $imagem
 * @property string|null $observacao
 * @property int $faculdade_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Faculdade $faculdade
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\AlunoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereDocumento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereFaculdadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereImagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereMatricula($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereObservacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno wherePais($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereTelefone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aluno whereUserId($value)
 */
	class Aluno extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $faculdade_id
 * @property int $user_id
 * @property string $matricula
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Faculdade $faculdade
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\BibliotecarioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario whereFaculdadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario whereMatricula($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bibliotecario whereUserId($value)
 */
	class Bibliotecario extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $tp_dominio
 * @property string $nm_dominio
 * @property int $nr_ordem
 * @property string $nm_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DominioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio whereNmCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio whereNmDominio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio whereNrOrdem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio whereTpDominio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dominio whereUpdatedAt($value)
 */
	class Dominio extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $livro_id
 * @property int $aluno_id
 * @property int $bibliotecario_id
 * @property string $dh_emprestimo
 * @property string|null $dh_devolucao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Aluno $aluno
 * @property-read \App\Models\Bibliotecario $bibliotecario
 * @property-read \App\Models\Livro $livro
 * @method static \Database\Factories\EmprestimoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereAlunoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereBibliotecarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereDhDevolucao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereDhEmprestimo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereLivroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Emprestimo whereUpdatedAt($value)
 */
	class Emprestimo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $livro_id
 * @property int $quantidade
 * @property int $status_estoque_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Livro $livro
 * @property-read \App\Models\Dominio $statusEstoque
 * @method static \Database\Factories\EstoqueLivroFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro whereLivroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro whereStatusEstoqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstoqueLivro whereUpdatedAt($value)
 */
	class EstoqueLivro extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nome
 * @property string $endereco
 * @property string $telefone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Aluno> $alunos
 * @property-read int|null $alunos_count
 * @method static \Database\Factories\FaculdadeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade whereTelefone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faculdade whereUpdatedAt($value)
 */
	class Faculdade extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $titulo
 * @property string $codigo
 * @property string $autor
 * @property string $editora
 * @property string $edicao
 * @property string $ano
 * @property string|null $imagem
 * @property string|null $pdf
 * @property string|null $observacao
 * @property int $categoria_livro_id
 * @property int $localizacao_id
 * @property int $bibliotecario_id
 * @property int $faculdade_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $bibliotecario
 * @property-read \App\Models\Dominio $categoriaLivro
 * @property-read \App\Models\Dominio $faculdade
 * @property-read \App\Models\Localizacao $localizacao
 * @method static \Database\Factories\LivroFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereAno($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereBibliotecarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereCategoriaLivroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereEdicao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereEditora($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereFaculdadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereImagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereLocalizacaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereObservacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Livro whereUpdatedAt($value)
 */
	class Livro extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $estante_id
 * @property int $fileira_id
 * @property int $prateleira_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Dominio $estante
 * @property-read \App\Models\Dominio $fileira
 * @property-read \App\Models\Dominio $prateleira
 * @method static \Database\Factories\LocalizacaoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao whereEstanteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao whereFileiraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao wherePrateleiraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Localizacao whereUpdatedAt($value)
 */
	class Localizacao extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

