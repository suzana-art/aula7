<?php

ob_start();

?>

<div class="container mt-4">

    <h2 class="mb-4">Cadastrar Pessoa</h2>

    <div class="card shadow-sm">

        <div class="card-body">

            <form action="pessoa-create.php" method="POST">

                <div class="mb-3">

                    <label for="nome" class="form-label">
                        Nome
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="nome"
                        name="nome"
                        maxlength="100"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label for="telefone" class="form-label">
                        Telefone
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="telefone"
                        name="telefone"
                        maxlength="20"
                    >

                </div>


                <div class="mb-3">

                    <label for="cpf" class="form-label">
                        CPF
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="cpf"
                        name="cpf"
                        maxlength="14"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label for="endereco" class="form-label">
                        Endereço
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="endereco"
                        name="endereco"
                        maxlength="255"
                    >

                </div>


                <button type="submit" class="btn btn-primary">
                    Cadastrar
                </button>

                <a
                    href="pessoa-listar.php"
                    class="btn btn-secondary"
                >
                    Listar Pessoas
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