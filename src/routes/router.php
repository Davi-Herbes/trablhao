<?php
    
class Router {
    protected $routes = [];

    public function get($uri, $callback) {
        $this->routes['GET'][$uri] = $callback;
    }

    public function post($uri, $callback) {
        $this->routes['POST'][$uri] = $callback;
    }

    public function dispatch($currentUri = null, $method = null) {
        $uri = $currentUri ?? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $method ?? $_SERVER['REQUEST_METHOD'];

        $uri = rtrim($uri, '/');
        $uri = str_replace("/livros", '', $uri);
        echo $uri;

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];

            if (is_callable($callback)) {
                return call_user_func($callback);
            }

            throw new Exception("Erro AAAAAAAAAAAAAA");

        }

        http_response_code(404);
        echo "Página não encontrada.";
    }
}

?>
