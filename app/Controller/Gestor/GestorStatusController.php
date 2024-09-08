<?php 

namespace App\Controller\Gestor;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class GestorStatusController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["GESTOR"]){
            $nome = $requestData["nome"];
            $status = $requestData["status"] == "ativar" ? 1 : 0;

            $dados = [
                "status"  => $status
            ];

            $query = new Eletiva();

            $update = $query->alterarStatus($dados,$nome);

            if($update){
                $_SESSION["StatusAlterado"] = [
                    "nome" => $nome,
                    "status" => $requestData["status"] == "ativar" ? "ativado" : "desativado"
                ];
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