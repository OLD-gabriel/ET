<?php

namespace App\Controller;

abstract class AbstractController
{
    public function render(
        string $viewName,
        array $data = [],
        bool $simple = False,
        string $title = "ESCOLA NSL",
        int $caminhos = 1,
        bool $gestor = False): void
    {
        if($simple == False){
            require_once( 'public/' . '/view/includes/header.php');
            require_once( 'public/' . '/view/' . $viewName . '.php');
            require_once( 'public/' . '/view/includes/footer.php');
        }else{
            require_once( 'public/' . '/view/' . $viewName . '.php');
        }
    }

    public function showJson(array $data): never
    {
        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    public function redirect(string $route): never
    {
        $baseUrl = $_ENV["URL"];
    
        if (strpos($route, '/') === 0) {
            $route = substr($route, 1);
        }
    
        $redirectUrl = "{$baseUrl}/{$route}";
    
        header("Location: $redirectUrl");
        die();
    }

    public function show($data): void
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    

    /** Deve fazer o include da view */
    abstract public function index(array $requestData): void;
}
