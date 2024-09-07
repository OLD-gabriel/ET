<?php 

header("Content-Type: application/json");

include "../../../vendor/autoload.php";

use Dotenv\Dotenv; 

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

use App\Config\Database\Query;

$sql = "SELECT * FROM eletivas";

$query = new Query();

$dados = $query->select("eletivas");

echo json_encode($dados);

die();


