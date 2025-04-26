<?php

class Route
{
    public function run()
    {
                $page = $_GET['page'] ?? 'home';
        $parts = explode('/', $page);

        $controllerName = ucfirst($parts[0]) . 'Controller';
        $methodName = $parts[1] ?? 'index';

        $controllerFile = BASE_PATH . "/app/Controllers/{$controllerName}.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerName)) {
                $controller = new $controllerName;

                if (method_exists($controller, $methodName)) {
                    $params = array_slice($parts, 2);
                
                    if (!empty($params)) {
                        call_user_func_array([$controller, $methodName], $params);
                    } else {
                        $controller->$methodName();
                    }
                } else {
                    echo "Hata: `$methodName` metodu bulunamadı.";
                }             
            } 
            
        } 

        
    }
}
