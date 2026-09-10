<?php

require_once "../vendor/autoload.php";

use App\DAO\MovimentacaoDAO;
use App\Model\Movimentacao;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: movimentacao-cadastrar.php");
    exit;

}


$pessoaId = (int) ($_POST['pessoa_id'] ?? 0);
$tipo = trim($_POST['tipo'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');


if ($pessoaId <= 0 || $tipo === '') {

    die("Pessoa e tipo são obrigatórios.");

}


$movimentacao = new Movimentacao(
    $pessoaId,
    $tipo,
    $descricao !== '' ? $descricao : null
);


$dao = new MovimentacaoDAO();


if ($dao->insert($movimentacao)) {

    header("Location: movimentacao-listar.php");
    exit;

}


die("Erro ao cadastrar movimentação.");