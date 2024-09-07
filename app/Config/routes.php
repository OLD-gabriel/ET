<?php

use App\Controller\Eletivas\EletivaEscolherController;
use App\Controller\Eletivas\EletivasController;
use App\Controller\Error\NotFoundController;
use App\Controller\home\HomeController;
use App\Controller\login\EncerrarController;
use App\Controller\login\LoginAutenticar;
use App\Controller\login\LoginController;

$router = [
    'routes' => [
        ''                  => LoginController::class,
        'login'             => LoginController::class,
        'login/autenticar'  =>LoginAutenticar::class,
        'sair'              => EncerrarController::class,
        'home'              => HomeController::class,
        'eletivas'          => EletivasController::class,
        'eletiva/escolher'  => EletivaEscolherController::class
    ],
    'default'               => NotFoundController::class
];
