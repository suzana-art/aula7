<?php

require_once "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {

    die("Pessoa inválida.");

}

$dao = new PessoaDAO();

$pessoa = $dao->buscarPorId($id);

if (!$pessoa) {

    die("Pessoa não encontrada.");

}

ob_start();

?>

<div class="container mt-4">

    <h2 class="mb-4">
        Editar Pessoa
    </h2>


    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="pessoa-update.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="id"
                    value="<?= $pessoa['id'] ?>"
                >


                <div class="mb-3">

                    <label
                        for="nome"
                        class="form-label"
                    >
                        Nome
                    </label>

                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        class="form-control"
                        maxlength="100"
                        value="<?= htmlspecialchars($pessoa['nome']) ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="telefone"
                        class="form-label"
                    >
                        Telefone
                    </label>

                    <input
                        type="text"
                        name="telefone"
                        id="telefone"
                        class="form-control"
                        maxlength="20"
                        value="<?= htmlspecialchars($pessoa['telefone'] ?? '') ?>"
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="cpf"
                        class="form-label"
                    >
                        CPF
                    </label>

                    <input
                        type="text"
                        name="cpf"
                        id="cpf"
                        class="form-control"
                        maxlength="14"
                        value="<?= htmlspecialchars($pessoa['cpf']) ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="endereco"
                        class="form-label"
                    >
                        Endereço
                    </label>

                    <input
                        type="text"
                        name="endereco"
                        id="endereco"
                        class="form-control"
                        maxlength="255"
                        value="<?= htmlspecialchars($pessoa['endereco'] ?? '') ?>"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Salvar Alterações
                </button>


                <a
                    href="pessoa-listar.php"
                    class="btn btn-secondary"
                >
                    Cancelar
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