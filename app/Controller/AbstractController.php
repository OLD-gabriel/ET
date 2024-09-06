<?php

namespace App\Controller;

abstract class AbstractController
{
    public function render(string $viewName, array $data = [],bool $simple = false,$title = "ESCOLA NSL"): void
    {
        if($simple == false){
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
    

    /** Deve fazer o include da view */
    abstract public function index(array $requestData): void;
}
