<?php

namespace App\Controller\home;

use App\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(array $data): void
    {
        if($_SESSION["LOGIN"]){
            $this->render(viewName: 'home/home');
        }else{
            $this->redirect("/login");
        }
    }

}
