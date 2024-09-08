<?php

namespace App\Controller\Gestor;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class GestorHomeController extends AbstractController
{
    public function index(array $data): void
    {
        if ($_SESSION["GESTOR"]) {

            $apiUrl = 'https://escolansl.com/monitoramento/app/config/Geturmas.php';
            $jsonData = file_get_contents($apiUrl);
            $dataArray = json_decode($jsonData, true);

            $turmasPorTurno = [];
            foreach ($dataArray as $turma) {
                $turmasPorTurno[$turma['turno']][] = $turma;
            }

            $query = new Eletiva();
            $escolhas = $query->escolhasEletivas();    

            $dados = [
                "turmasPorTurno" => $turmasPorTurno,
                "SCRIPT"         => "gestor.js",
                "escolhas"         => $escolhas
            ];

            $this->render(viewName: 'gestor/home', caminhos: 2, data: $dados,title: "Gestor");
        } else {
            $this->redirect("/login");
        }
    }
}
