<?php

namespace App\Controller\Gestor;

use App\Controller\AbstractController;

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

            $dados = [
                "turmasPorTurno" => $turmasPorTurno
            ];

            $this->render(viewName: 'gestor/home', caminhos: 2, data: $dados);
        } else {
            $this->redirect("/login");
        }
    }
}
