<?php 

namespace App\Controller\Eletivas;

use App\Controller\AbstractController;

class EletivasController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["LOGIN"]){
            $this->render( viewName: "eletivas", title: "Eletivas");
        }
    }
}