<?php 

namespace App\Controller\Eletivas;

use App\Controller\AbstractController;
use App\Model\Eletiva;

class EletivaEscolherController extends AbstractController
{
    public function index(array $requestData): void
    {
        if($_SESSION["LOGIN"]){
            
        }else{
            $this->redirect("/login");
        }
    }
}