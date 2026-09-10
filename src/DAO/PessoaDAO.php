<?php

namespace App\DAO;

use App\Config\Database;
use App\Model\Pessoa;
use PDOException;

class PessoaDAO
{
    // ==========================================
    // VERIFICAR CPF
    // ==========================================

    private function cpfExists(string $cpf, \PDO $conexao, ?int $id = null): bool
    {
        if ($id !== null) {

            $sql = "SELECT id
                    FROM pessoas
                    WHERE cpf = :cpf
                    AND id <> :id
                    LIMIT 1";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':id', $id);

        } else {

            $sql = "SELECT id
                    FROM pessoas
                    WHERE cpf = :cpf
                    LIMIT 1";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':cpf', $cpf);
        }

        $stmt->execute();

        return (bool) $stmt->fetch();
    }


    // ==========================================
    // CADASTRAR
    // ==========================================

    public function insert(Pessoa $pessoa): bool
    {
        try {

            $database = new Database();
            $conexao = $database->connect();

            if ($this->cpfExists($pessoa->getCpf(), $conexao)) {
                return false;
            }

            $sql = "INSERT INTO pessoas
                    (nome, telefone, cpf, endereco)
                    VALUES
                    (:nome, :telefone, :cpf, :endereco)";

            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':nome', $pessoa->getNome());
            $stmt->bindValue(':telefone', $pessoa->getTelefone());
            $stmt->bindValue(':cpf', $pessoa->getCpf());
            $stmt->bindValue(':endereco', $pessoa->getEndereco());

            return $stmt->execute();

        } catch (PDOException $e) {

            return false;
        }
    }


    // ==========================================
    // LISTAR
    // ==========================================

    public function listar(): array
    {
        $database = new Database();
        $conexao = $database->connect();

        $sql = "SELECT id, nome, telefone, cpf, endereco
                FROM pessoas
                ORDER BY id DESC";

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    // ==========================================
    // PESQUISAR POR NOME
    // ==========================================

    public function pesquisar(string $nome): array
    {
        $database = new Database();
        $conexao = $database->connect();

        $sql = "SELECT id, nome, telefone, cpf, endereco
                FROM pessoas
                WHERE nome LIKE :nome
                ORDER BY nome ASC";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(
            ':nome',
            '%' . $nome . '%'
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }


    // ==========================================
    // BUSCAR UMA PESSOA PELO ID
    // ==========================================

    public function buscarPorId(int $id): ?array
    {
        $database = new Database();
        $conexao = $database->connect();

        $sql = "SELECT id, nome, telefone, cpf, endereco
                FROM pessoas
                WHERE id = :id
                LIMIT 1";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $pessoa = $stmt->fetch();

        return $pessoa ?: null;
    }


    // ==========================================
    // EDITAR
    // ==========================================

    public function update(Pessoa $pessoa): bool
    {
        try {

            $database = new Database();
            $conexao = $database->connect();

            if ($this->cpfExists(
                $pessoa->getCpf(),
                $conexao,
                $pessoa->getId()
            )) {

                return false;
            }

            $sql = "UPDATE pessoas
                    SET nome = :nome,
                        telefone = :telefone,
                        cpf = :cpf,
                        endereco = :endereco
                    WHERE id = :id";

            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':nome', $pessoa->getNome());
            $stmt->bindValue(':telefone', $pessoa->getTelefone());
            $stmt->bindValue(':cpf', $pessoa->getCpf());
            $stmt->bindValue(':endereco', $pessoa->getEndereco());
            $stmt->bindValue(':id', $pessoa->getId());

            return $stmt->execute();

        } catch (PDOException $e) {

            return false;
        }
    }


    // ==========================================
    // EXCLUIR
    // ==========================================

    public function delete(int $id): bool
    {
        try {

            $database = new Database();
            $conexao = $database->connect();

            $sql = "DELETE FROM pessoas
                    WHERE id = :id";

            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':id', $id);

            return $stmt->execute();

        } catch (PDOException $e) {

            return false;
        }
    }
}