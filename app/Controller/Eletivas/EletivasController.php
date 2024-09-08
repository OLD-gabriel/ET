<?php 

namespace App\Controller\Eletivas;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class EletivasController extends AbstractController
{
    public function index(array $requestData): void
    {
        if ($_SESSION["LOGIN"]) {
            $query = new Eletiva();
            $eletivas = $query->eletivas();

            $turmaAluno = $_SESSION["TURMA"];

            $eletivasFiltradas = array_filter($eletivas, function($eletiva) use ($turmaAluno) {
                $turmasEletiva = explode(';', $eletiva['turmas']);
                return in_array($turmaAluno, $turmasEletiva);
            });

            $EletivaEscolhida = $query->pesquisarAlunoEletiva($_SESSION["RA"]);

            $dados = [
                "eletivas" => $eletivasFiltradas,
                "escolha"  => $EletivaEscolhida,
                "SCRIPT"   => "eletiva.js"
            ];

            $this->render(viewName: "eletiva/eletivas", title: "Eletivas", data: $dados);
        } else {
            $this->redirect("/login");
        }
    }
}
