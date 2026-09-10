<?php

require_once "../vendor/autoload.php";

use App\DAO\PessoaDAO;
use App\Model\Pessoa;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: pessoa-listar.php");
    exit;

}


$id = (int) ($_POST['id'] ?? 0);

$nome = trim($_POST['nome'] ?? '');

$telefone = trim($_POST['telefone'] ?? '');

$cpf = trim($_POST['cpf'] ?? '');

$endereco = trim($_POST['endereco'] ?? '');


if ($id <= 0 || $nome === '' || $cpf === '') {

    die("Dados inválidos.");

}


$pessoa = new Pessoa(
    $nome,
    $telefone !== '' ? $telefone : null,
    $cpf,
    $endereco !== '' ? $endereco : null
);

$pessoa->setId($id);


$dao = new PessoaDAO();


if ($dao->update($pessoa)) {

    header("Location: pessoa-listar.php");
    exit;

}


die(
    "Não foi possível atualizar a pessoa. " .
    "Verifique se o CPF já está cadastrado para outra pessoa."
);