<?php 

namespace App\Core;

final class Router {
    private $routes = [];

    public function add($route) {
        $this->routes[] = $route;
    }

    public function match(string $request) {
        $matches = [];
        foreach ($this->routes as $route) {
            $patron = $route["path"];
            if (preg_match($patron, $request)) {
                $matches = $route;
            }
        }
        return $matches;
    }
}
?>