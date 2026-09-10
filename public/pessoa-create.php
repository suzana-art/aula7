<?php

require_once "../vendor/autoload.php";

use App\DAO\PessoaDAO;
use App\Model\Pessoa;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: pessoa-cadastrar.php");
    exit;

}


$nome = trim($_POST['nome'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');


if ($nome === '' || $cpf === '') {

    die("Nome e CPF são obrigatórios.");

}


$pessoa = new Pessoa(
    $nome,
    $telefone !== '' ? $telefone : null,
    $cpf,
    $endereco !== '' ? $endereco : null
);


$pessoaDAO = new PessoaDAO();

if ($pessoaDAO->insert($pessoa)) {

    header("Location: pessoa-listar.php");
    exit;

}


die("Não foi possível cadastrar a pessoa. Verifique se o CPF já está cadastrado.");