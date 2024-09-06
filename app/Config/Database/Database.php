<?php

namespace App\Database;

use PDO;
use PDOException;

readonly class Database
{
    private PDO $pdo;

    public function __construct(
        string $host,
        string $database,
        string $username,
        string $password,
        ?int $port = null,
    ) {
        try {
            $dsn = "mysql:host={$host};dbname={$database};charset=utf8";
            if ($port) {
                $dsn .= ";port={$port};";
            }

            $this->pdo = new PDO(
                dsn: $dsn,
                username: $username,
                password: $password
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: {$e->getMessage()}";
            exit;
        }
    }

    public function connection(): PDO
    {
        return $this->pdo;
    }
}
