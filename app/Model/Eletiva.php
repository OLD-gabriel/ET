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
}
