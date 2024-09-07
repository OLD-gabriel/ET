<?php

namespace App\Model;

use App\Config\Database\Query;
use App\Config\Database\Database;

class Eletiva
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function eletivas(): array
    {
        $categorias = $this->query->select("eletivas");

        return $categorias;
    }

    public function PegarEletiva($id): array
    {
        return $this->query->select('eletivas', "id = {$id}")[0];
    }

    public function InserirAlunoEletiva($dados): bool
    {
       $query = $this->query->insert("eletivas_escolhas",$dados);
        return $query;
    }

    public function diminuirVagas(int $id, int $quantidade): bool
    {
        $update = $this->query->update("eletivas",["vagas" => $quantidade], "id = {$id}");

        return $update;
    }

    public function pesquisarAlunoEletiva($ra): array
    {
        return $this->query->select('eletivas_escolhas', "ra_aluno = {$ra}");
    }
}
