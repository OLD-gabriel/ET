<?php

namespace App\Controller\Gestor;

use App\Controller\AbstractController;

class GestorController extends AbstractController
{
    public function index(array $data): void
    {
        if($_SESSION["GESTOR"]){
            $this->render(viewName: 'gestor/gestor', simple: true);
        }else{
            $this->redirect("/login");
        }
        
    }

}
