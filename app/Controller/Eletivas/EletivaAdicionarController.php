<?php 

namespace App\Controller\Eletivas;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class EletivaAdicionarController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["LOGIN"]){
            
            $professores = [];

            foreach($requestData["nome-professor"] as $prof){
                if($prof != NULL){
                    $professores[] = $prof;
                }
            }

            $dados = [
                "nome_eletiva"      => $requestData["nome"],
                "nome_professores"  => implode(";",$professores),
                "vagas"             => $requestData["vagas"],
                "turmas"            => implode(";",$requestData["turmas"])
            ];

            dd($dados);

        }else{
            $this->redirect("/login");
        }
    }
}