<?php

use App\Controller\Eletivas\EletivaEscolherController;
use App\Controller\Eletivas\EletivasController;
use App\Controller\Error\NotFoundController;
use App\Controller\Gestor\GestorAutenticarController;
use App\Controller\home\HomeController;
use App\Controller\login\EncerrarController;
use App\Controller\Gestor\GestorController;
use App\Controller\Gestor\GestorEletivaAdicionarController;
use App\Controller\Gestor\GestorExcluirEscolhaController;
use App\Controller\Gestor\GestorHomeController;
use App\Controller\login\LoginAutenticar;
use App\Controller\login\LoginController;

$router = [
    'routes' => [
        ''                          => LoginController::class,
        'login'                     => LoginController::class,
        'login/autenticar'          => LoginAutenticar::class,
        'gestor'                    => GestorController::class,
        'gestor/autenticar'         => GestorAutenticarController::class,
        'gestor/home'               => GestorHomeController::class,
        'sair'                      => EncerrarController::class,
        'home'                      => HomeController::class,
        'eletivas'                  => EletivasController::class,
        'eletiva/escolher'          => EletivaEscolherController::class,
        'gestor/eletiva/adicionar'  => GestorEletivaAdicionarController::class,
        'gestor/excluir/escolha'    => GestorExcluirEscolhaController::class
    ],
    'default'               => NotFoundController::class
];