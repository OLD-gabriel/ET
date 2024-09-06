<?php

namespace App\Controller\Error;

use App\Controller\AbstractController;

class NotFoundController extends AbstractController
{
    public function index(array $data): void
    {
        $this->render(viewName:'error/404',simple: true);
    }
}
