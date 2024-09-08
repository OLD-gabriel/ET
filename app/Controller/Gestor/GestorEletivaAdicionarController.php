<?php 

namespace App\Controller\Gestor;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class GestorEletivaAdicionarController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["GESTOR"]){
            
            $professores = [];

            foreach($requestData["nome-professor"] as $prof){
                if($prof != NULL){
                    $professores[] = $prof;
                }
            }

            $dados = [
                "nome_eletiva"      => $requestData["nome"],
                "nome_professores"  => implode(";",$professores),
                "turmas"            => implode(";",$requestData["turmas"]),
                "turno"             => $requestData["turno"],
                "vagas"             => $requestData["vagas"]
            ];

            $query = new Eletiva();
            $inserir = $query->InserirEletiva($dados);

            if($inserir){
                $_SESSION["InserirEletiva"] = True;
                $_SESSION["InserirEletivaNome"] = $requestData["nome"];
                $this->redirect("/gestor/home");
            }else{
                $_SESSION["ERRO"] = True;
                $this->redirect("/gestor/home");
            }
        }else{
            $this->redirect("/login");
        }
    }
}