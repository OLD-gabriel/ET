<?php 

header("Content-Type: application/json");

include "../../../vendor/autoload.php";

use Dotenv\Dotenv; 

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

use App\Config\Database\Query;

$query = new Query();

$dados = $query->select("eletivas_escolhas");

echo json_encode($dados);

die();


