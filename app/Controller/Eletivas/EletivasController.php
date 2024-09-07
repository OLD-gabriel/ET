<?php 

namespace App\Controller\Eletivas;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class EletivasController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["LOGIN"]){
            $query = new Eletiva();
            $eletivas = $query->eletivas();
            $dados = [
                "eletivas" => $eletivas
            ];

            $this->render( viewName: "eletiva/eletivas", title: "Eletivas",data: $dados);
        }else{
            $this->redirect("/login");
        }
    }
}