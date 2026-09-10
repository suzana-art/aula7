<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private string $host = 'localhost';
    private string $dbname = 'aula4';
    private string $user = 'root';
    private string $password = '';

    public function connect(): PDO
    {
        try {
            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                $this->user,
                $this->password
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;

        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}

