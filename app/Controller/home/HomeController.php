<?php

namespace App\Controller\home;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class HomeController extends AbstractController
{
    public function index(array $data): void
    {
        if($_SESSION["LOGIN"]){
            $query = new Eletiva;
            $liberado = $query->liberado();

            $status = [];
            foreach ($liberado as $eletiva) {
                $status[$eletiva['nome']] = $eletiva['status'];
            }

            $dados = [
                "liberado"  => $status,
                "SCRIPT"    => "home.js"         
            ];

            $this->render(viewName: 'home/home',data: $dados);
        }else{
            $this->redirect("/login");
        }
    }

}
