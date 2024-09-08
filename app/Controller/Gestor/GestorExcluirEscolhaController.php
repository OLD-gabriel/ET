<?php

namespace App\Controller\Gestor;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class GestorExcluirEscolhaController extends AbstractController
{
    public function index(array $data): void
    {
        if($_SESSION["GESTOR"]){
            $id = $data["id"];
            
            $query = new Eletiva();
            $Escolha = $query->pesquisarAlunoEletivaID($id);
            $excluir = $query->excluirEscolha($id);

            if($excluir){
                $_SESSION["ExcluirEscolha"] = [
                    "NomeAluno" => $Escolha["nome_aluno"],
                    "NomeEletiva" => $Escolha["nome_eletiva"]
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
