<?php 

namespace App\Controller\Gestor;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class GestorEditarEletivaController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["GESTOR"]){
            $id = $requestData["id"];

            foreach($requestData["editar-nome-professor"] as $prof){
                if($prof != NULL){
                    $professores[] = $prof;
                }
            }

            $dados = [
                "nome_eletiva" => $requestData["editar-nome"],
                "nome_professores" => implode(";",$professores),
                "turmas" => implode(";",$requestData["editar-turmas"]),
                "turno" => $requestData["editar-turno"],
                "vagas" => $requestData["editar-vagas"],
            ];

            $query = new Eletiva();
            $update = $query->editarEletiva($dados,$id);

            if($update){
                $_SESSION["EditarEletiva"] = $dados["nome_eletiva"];
                $this->redirect("/gestor/home");
            }else{
                $_SESSION["ERRO"];
                $this->redirect("/gestor/home");
        }

        }else{
            $this->redirect("/login");
        }
    }
}