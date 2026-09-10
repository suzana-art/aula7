<?php

require_once "../vendor/autoload.php";

use App\DAO\MovimentacaoDAO;

$dao = new MovimentacaoDAO();

$movimentacoes = $dao->listar();

ob_start();

?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Lista de Movimentações
        </h2>


        <a
            href="movimentacao-cadastrar.php"
            class="btn btn-primary"
        >
            Cadastrar Movimentação
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <?php if (count($movimentacoes) > 0): ?>

                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>
                                <th>Pessoa</th>
                                <th>Tipo</th>
                                <th>Descrição</th>
                                <th>Data</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach ($movimentacoes as $mov): ?>

                                <tr>

                                    <td>
                                        <?= htmlspecialchars($mov['id']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($mov['pessoa']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($mov['tipo']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($mov['descricao'] ?? '') ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($mov['data_movimentacao']) ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="alert alert-info">

                    Nenhuma movimentação cadastrada.

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