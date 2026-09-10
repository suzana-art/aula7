<?php

namespace App\DAO;

use App\Config\Database;
use App\Model\Movimentacao;

class MovimentacaoDAO
{
    public function insert(Movimentacao $movimentacao): bool
    {
        $database = new Database();
        $conexao = $database->connect();

        $sql = "INSERT INTO movimentacoes
                (pessoa_id, tipo, descricao)
                VALUES
                (:pessoa_id, :tipo, :descricao)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(
            ':pessoa_id',
            $movimentacao->getPessoaId()
        );

        $stmt->bindValue(
            ':tipo',
            $movimentacao->getTipo()
        );

        $stmt->bindValue(
            ':descricao',
            $movimentacao->getDescricao()
        );

        return $stmt->execute();
    }


    public function listar(): array
    {
        $database = new Database();
        $conexao = $database->connect();

        $sql = "SELECT
                    m.id,
                    p.nome AS pessoa,
                    m.tipo,
                    m.descricao,
                    m.data_movimentacao

                FROM movimentacoes m

                INNER JOIN pessoas p
                    ON p.id = m.pessoa_id

                ORDER BY m.id DESC";

        $stmt = $conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}