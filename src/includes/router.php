<?php

class Router {
    public function route($url){
        $routes = [
            "/" => "./views/home/index.view.php",
            "/register" => "./views/register/index.view.php"
        ];

        if(array_key_exists($url, $routes)){
            require $routes[$url];
        }else require "404.php";
    }
}



?>