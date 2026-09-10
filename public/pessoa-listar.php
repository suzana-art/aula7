<?php

require_once "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$pessoaDAO = new PessoaDAO();


// ==========================================
// PESQUISA POR NOME
// ==========================================

$nomePesquisa = trim($_GET['nome'] ?? '');

if ($nomePesquisa !== '') {

    $pessoas = $pessoaDAO->pesquisar($nomePesquisa);

} else {

    $pessoas = $pessoaDAO->listar();

}


ob_start();

?>

<div class="container mt-4">

    <!-- ========================================== -->
    <!-- TÍTULO -->
    <!-- ========================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Lista de Pessoas</h2>

        <a
            href="pessoa-cadastrar.php"
            class="btn btn-primary"
        >
            + Cadastrar Pessoa
        </a>

    </div>


    <!-- ========================================== -->
    <!-- PESQUISA -->
    <!-- ========================================== -->

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form
                action="pessoa-listar.php"
                method="GET"
                class="row g-3"
            >

                <div class="col-md-8">

                    <label
                        for="nome"
                        class="form-label"
                    >
                        Pesquisar por nome
                    </label>

                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        class="form-control"
                        placeholder="Digite o nome da pessoa"
                        value="<?= htmlspecialchars($nomePesquisa) ?>"
                    >

                </div>


                <div class="col-md-2 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Pesquisar
                    </button>

                </div>


                <div class="col-md-2 d-flex align-items-end">

                    <a
                        href="pessoa-listar.php"
                        class="btn btn-secondary w-100"
                    >
                        Limpar
                    </a>

                </div>

            </form>

        </div>

    </div>


    <!-- ========================================== -->
    <!-- TABELA -->
    <!-- ========================================== -->

    <div class="card shadow-sm">

        <div class="card-body">

            <?php if (count($pessoas) > 0): ?>

                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>

                                <th>Nome</th>

                                <th>Telefone</th>

                                <th>CPF</th>

                                <th>Endereço</th>

                                <th class="text-center">
                                    Ações
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach ($pessoas as $pessoa): ?>

                                <tr>

                                    <!-- ID -->

                                    <td>
                                        <?= htmlspecialchars($pessoa['id']) ?>
                                    </td>


                                    <!-- NOME -->

                                    <td>
                                        <?= htmlspecialchars($pessoa['nome']) ?>
                                    </td>


                                    <!-- TELEFONE -->

                                    <td>
                                        <?= htmlspecialchars(
                                            $pessoa['telefone'] ?? ''
                                        ) ?>
                                    </td>


                                    <!-- CPF -->

                                    <td>
                                        <?= htmlspecialchars($pessoa['cpf']) ?>
                                    </td>


                                    <!-- ENDEREÇO -->

                                    <td>
                                        <?= htmlspecialchars(
                                            $pessoa['endereco'] ?? ''
                                        ) ?>
                                    </td>


                                    <!-- AÇÕES -->

                                    <td class="text-center">

                                        <!-- EDITAR -->

                                        <a
                                            href="pessoa-editar.php?id=<?= (int)$pessoa['id'] ?>"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Editar
                                        </a>


                                        <!-- EXCLUIR -->

                                        <a
                                            href="pessoa-excluir.php?id=<?= (int)$pessoa['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir esta pessoa?');"
                                        >
                                            Excluir
                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <!-- ========================================== -->
                <!-- NENHUM RESULTADO -->
                <!-- ========================================== -->

                <div class="alert alert-info mb-0">

                    <?php if ($nomePesquisa !== ''): ?>

                        Nenhuma pessoa encontrada para:

                        <strong>
                            <?= htmlspecialchars($nomePesquisa) ?>
                        </strong>

                    <?php else: ?>

                        Nenhuma pessoa cadastrada.

                    <?php endif; ?>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>


<?php

$content = ob_get_clean();

require "layout.php";

require "footer.php";

?>