<?php

require_once "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    die("Pessoa inválida.");
}

$dao = new PessoaDAO();

if ($dao->delete($id)) {

    header("Location: pessoa-listar.php");
    exit;
}

die(
    "Não foi possível excluir esta pessoa. " .
    "Verifique se ela possui movimentações cadastradas."
);