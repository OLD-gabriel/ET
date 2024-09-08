<?php 

namespace App\Controller\Gestor;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class GestorExcluirEletivaController extends AbstractController
{
    public function index(array $requestData): void
    {
       if($_SESSION["GESTOR"]){
            $query = new Eletiva();
            $eletiva = $query->PegarEletiva($requestData["id"]);
            $excluir = $query->excluirEletiva($requestData["id"]);
            $ExcluirAlunos = $query->excluirEletivaEscolhas($requestData["id"]);

            if($excluir){
                $_SESSION["ExcluirEletiva"] = $eletiva["nome_eletiva"];
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