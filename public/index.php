<?php

ob_start();

?>

<div class="container mt-5">

    <div class="text-center">

        <h1>Sistema de Controle</h1>

        <p class="lead">
            Bem-vindo ao sistema.
        </p>

        <p>
            Utilize o menu acima para acessar as funcionalidades.
        </p>

    </div>

</div>

<?php

$content = ob_get_clean();

require "layout.php";

require "footer.php";

?>