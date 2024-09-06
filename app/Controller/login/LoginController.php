<?php

namespace App\Controller\login;

use App\Controller\AbstractController;

class LoginController extends AbstractController
{
    public function index(array $data): void
    {
        $this->render(viewName: 'login/login', simple: true);
    }

}
