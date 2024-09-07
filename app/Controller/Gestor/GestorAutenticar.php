<?php 

namespace App\Controller\Gestor;

use App\Controller\AbstractController;

class GestorAutenticar extends AbstractController
{
    public function index(array $requestData): void
    {
        if($requestData["senha"] == $_ENV["SENHA_GESTOR"]){
            $_SESSION["GESTOR"] = TRUE;
            $this->redirect("/gestor/home");
        }else{
            $_SESSION['SenhaIncorreta'] = true;
            $this->redirect("/gestor");
        }
    }
}