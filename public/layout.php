<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Controle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">

        <!-- LOGO / NOME DO SISTEMA -->
        <a class="navbar-brand" href="index.php">
            Controle
        </a>


        <!-- BOTÃO PARA CELULAR -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Abrir menu"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- MENU -->
        <div
            class="collapse navbar-collapse"
            id="navbarNav"
        >

            <ul class="navbar-nav">


                <!-- ========================================= -->
                <!-- PESSOAS -->
                <!-- ========================================= -->

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Pessoas
                    </a>


                    <ul class="dropdown-menu">

                        <!-- CADASTRAR PESSOA -->
                        <li>

                            <a
                                class="dropdown-item"
                                href="pessoa-cadastrar.php"
                            >
                                Cadastrar
                            </a>

                        </li>


                        <!-- LISTAR PESSOAS -->
                        <li>

                            <a
                                class="dropdown-item"
                                href="pessoa-listar.php"
                            >
                                Listar
                            </a>

                        </li>

                    </ul>

                </li>



                <!-- ========================================= -->
                <!-- MOVIMENTAÇÕES -->
                <!-- ========================================= -->

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Movimentações
                    </a>


                    <ul class="dropdown-menu">

                        <!-- CADASTRAR MOVIMENTAÇÃO -->
                        <li>

                            <a
                                class="dropdown-item"
                                href="movimentacao-cadastrar.php"
                            >
                                Cadastrar
                            </a>

                        </li>


                        <!-- LISTAR MOVIMENTAÇÕES -->
                        <li>

                            <a
                                class="dropdown-item"
                                href="movimentacao-listar.php"
                            >
                                Listar
                            </a>

                        </li>

                    </ul>

                </li>


            </ul>

        </div>

    </div>

</nav>


<!-- ========================================= -->
<!-- CONTEÚDO DA PÁGINA -->
<!-- ========================================= -->

<main>

    <?= $content ?>

</main>


<!-- BOOTSTRAP JAVASCRIPT -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>