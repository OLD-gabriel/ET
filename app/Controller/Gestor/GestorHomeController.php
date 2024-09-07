<?php

namespace App\Controller\Gestor;

use App\Controller\AbstractController;

class GestorHomeController extends AbstractController
{
    public function index(array $data): void
    {
        if($_SESSION["GESTOR"]){
            $this->render(viewName: 'gestor/home',caminhos: 2);
        }else{
            $this->redirect("/login");
        }
    }
}

