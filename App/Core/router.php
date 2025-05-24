<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $pattern, array|string $callback): void {
        $this->addRoute('GET', $pattern, $callback);
    }

    public function post(string $pattern, array|string $callback): void {
        $this->addRoute('POST', $pattern, $callback);
    }

    public function addRoute(string $method, string $pattern, array|string $callback): void {
        $this->routes[] = [
            'method' => strtoupper($method),
            'pattern' => $this->convertPattern($pattern),
            'callback' => $callback,
            'raw_pattern' => $pattern
        ];
    }

    private function convertPattern(string $pattern): string {
        // /user/{id} → #^/user/(\d+)$# gibi
        $pattern = preg_replace('#\{(\w+)\}#', '([^/]+)', $pattern);
        return '#^' . $pattern . '$#';
    }

    public function dispatch(string $uri, string $method) {
        $uri = parse_url($uri, PHP_URL_PATH); // ?query=string varsa temizle

        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) continue;

            if (preg_match($route['pattern'], $uri, $matches)) {
                array_shift($matches);

                if (is_array($route['callback'])) {
                    [$controllerClass, $methodName] = $route['callback'];
                } elseif (is_string($route['callback']) && str_contains($route['callback'], '@')) {
                    [$controllerClass, $methodName] = explode('@', $route['callback']);
                } else {
                    http_response_code(500);
                    echo "Geçersiz callback formatı.";
                    return;
                }

                if (!class_exists($controllerClass)) {
                    http_response_code(500);
                    echo "Controller '$controllerClass' bulunamadı.";
                    return;
                }

                $controller = new $controllerClass();

                if (!method_exists($controller, $methodName)) {
                    http_response_code(500);
                    echo "Metod '$methodName' bulunamadı.";
                    return;
                }

                return call_user_func_array([$controller, $methodName], $matches);
            }
        }

        http_response_code(404);
        echo "404 - Sayfa bulunamadı.";
    }
}
