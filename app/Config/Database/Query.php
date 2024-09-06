<?php

namespace App\Database;

class Query
{
    private \PDO $pdo;

    public function __construct()
    {
        $database = new Database(
            host: '127.0.0.1',
            database: 'Estoque',
            username: 'root',
            password: 'gabCBA',
            port: 3306,
        );

        $this->pdo = $database->connection();
    }

    public function select(string $tabela, string $condicao = null, string $colunas = '*'): false|array
    {
        try {
            $sql = "SELECT {$colunas} FROM {$tabela}";

            if($condicao !== null) {
                $sql .= " WHERE {$condicao}";
            }

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erro na consulta: {$e->getMessage()}";

            return false;
        }
    }

    public function insert(string $tabela, array $dados): false|int
    {
        try {
            $colunas = implode(', ', array_keys($dados));
            $valores = ':' . implode(', :', array_keys($dados));

            $sql = "INSERT INTO {$tabela} ({$colunas}) VALUES ({$valores})";

            $stmt = $this->pdo->prepare($sql);

            foreach ($dados as $coluna => $valor) {
                $stmt->bindValue(":{$coluna}", $valor);
            }

            $stmt->execute();

            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            echo "Erro na inserção: {$e->getMessage()}";

            return false;
        }
    }

    public function update(string $tabela, array $dados, string $condicao): bool
    {
        try {
            $sets = [];

            foreach ($dados as $coluna => $valor) {
                $sets[] = "{$coluna} = :{$coluna}";
            }

            $sql = "UPDATE {$tabela} SET " . implode(', ', $sets) . " WHERE {$condicao}";

            $stmt = $this->pdo->prepare($sql);

            foreach ($dados as $coluna => $valor) {
                $stmt->bindValue(":{$coluna}", $valor);
            }

            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            echo "Erro na atualização: {$e->getMessage()}";

            return false;
        }
    }

    public function delete(string $tabela, string $condicao): bool
    {
        try {
            $sql = "DELETE FROM {$tabela} WHERE {$condicao}";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            echo "Erro na exclusão: {$e->getMessage()}";

            return false;
        }
    }
}
