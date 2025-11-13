<?php

class Router {
    public function route($url){
        $routes = [
            "/" => "./views/home/index.view.php",
            "/register" => "./views/register/index.view.php",
            "/register-form" => "./views/register/register_process.php"
        ];
        
        if(array_key_exists($url, $routes)){
            require_once $routes[$url];
        }else {
            
            header("Location: /views/errors/index.view.php");
        }
    }
}



?>