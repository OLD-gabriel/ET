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
        $eletivas = $this->query->select("eletivas");

        return $eletivas;
    }

    public function liberado(): array
    {
        $eletivas = $this->query->select("liberado");

        return $eletivas;
    }

    public function escolhasEletivas(): array
    {
        $escolhas = $this->query->select("eletivas_escolhas");

        return $escolhas;
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

    public function InserirEletiva($dados): bool
    {
       $query = $this->query->insert("eletivas",$dados);
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

    public function pesquisarAlunoEletivaID($ra): array
    {
        return $this->query->select('eletivas_escolhas', "id = {$ra}")[0];
    }

    public function excluirEscolha($id): bool
    {
        $excluir = $this->query->delete("eletivas_escolhas","id = {$id}");
        
        return $excluir;
    }

    public function excluirEletivaEscolhas($id): bool
    {
        $excluir = $this->query->delete("eletivas_escolhas","id_eletiva = {$id}");
        
        return $excluir;
    }

    public function excluirEletiva($id): bool
    {
        $excluir = $this->query->delete("eletivas","id = {$id}");
        
        return $excluir;
    }

    public function alterarStatus($dados, $nome):bool
    {
        return $this->query->update("liberado",$dados,"nome = '{$nome}'");
    }

    
}
