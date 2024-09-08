<?php 

namespace App\Controller\login;

use App\Controller\AbstractController;

class LoginAutenticar extends AbstractController
{
    public function index(array $requestData): void
    {
        $alunoEncontrado = false;

        $apiUrl = 'https://escolansl.com/monitoramento/app/config/GetAlunos.php';
        $jsonData = file_get_contents($apiUrl);
        $dataArray = json_decode($jsonData, true);

        foreach ($dataArray as $aluno) {
            if ($requestData['ra'] == $aluno['ra']) {
                $alunoEncontrado = true;
                $_SESSION['LOGIN'] = True;
                $_SESSION['RA'] = $aluno['ra'];
                $_SESSION['NOME'] = $aluno['nome'];
                $_SESSION['TURMA'] = $aluno['turma'];
                $_SESSION['TURNO'] = $aluno['turno'];

                

                $this->redirect('/home');
            }
        }

        if(!$alunoEncontrado){
            $_SESSION['RaNaoEncontrado'] = true;
            $this->redirect("/login");
        }
    }
}