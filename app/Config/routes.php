<?php

use App\Controller\Error\NotFoundController;
use App\Controller\home\HomeController;
use App\Controller\login\LoginAutenticar;
use App\Controller\login\LoginController;

$router = [
    'routes' => [
        'login'             => LoginController::class,
        ''                  => LoginController::class,
        'login/autenticar'  =>LoginAutenticar::class,
        'home'              => HomeController::class
    ],
    'default'               => NotFoundController::class
];
