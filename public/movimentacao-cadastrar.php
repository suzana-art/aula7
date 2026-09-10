<?php

require_once "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$pessoaDAO = new PessoaDAO();

$pessoas = $pessoaDAO->listar();

ob_start();

?>

<div class="container mt-4">

    <h2 class="mb-4">
        Cadastrar Movimentação
    </h2>


    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="movimentacao-create.php"
                method="POST"
            >

                <div class="mb-3">

                    <label
                        for="pessoa_id"
                        class="form-label"
                    >
                        Pessoa
                    </label>


                    <select
                        name="pessoa_id"
                        id="pessoa_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Selecione uma pessoa
                        </option>

                        <?php foreach ($pessoas as $pessoa): ?>

                            <option value="<?= $pessoa['id'] ?>">

                                <?= htmlspecialchars($pessoa['nome']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <div class="mb-3">

                    <label
                        for="tipo"
                        class="form-label"
                    >
                        Tipo
                    </label>


                    <select
                        name="tipo"
                        id="tipo"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Selecione
                        </option>

                        <option value="Entrada">
                            Entrada
                        </option>

                        <option value="Saída">
                            Saída
                        </option>

                    </select>

                </div>


                <div class="mb-3">

                    <label
                        for="descricao"
                        class="form-label"
                    >
                        Descrição
                    </label>


                    <textarea
                        name="descricao"
                        id="descricao"
                        class="form-control"
                        maxlength="255"
                        rows="4"
                    ></textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Cadastrar
                </button>


                <a
                    href="movimentacao-listar.php"
                    class="btn btn-secondary"
                >
                    Listar Movimentações
                </a>

            </form>

        </div>

    </div>

</div>

<?php

$content = ob_get_clean();

require "layout.php";
require "footer.php";

?>