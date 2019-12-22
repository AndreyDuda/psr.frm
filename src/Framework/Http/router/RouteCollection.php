<?php
declare(strict_types=1);

namespace Framework\Http\router;

class RouteCollection
{
    private $routes = [];

    public function any(string $name, string $pattern, string $handler, array $tokens = []): void
    {
        $this->routes[] = new Route($name, $pattern, $handler, [], $tokens);
    }

    public function get(string $name, $pattern, $handler, array $tokens = []): void
    {
        $this->routes[] = new Route($name, $pattern, $handler, [], $tokens);
    }

    public function post(string $name, string $pattern, string $handler, array $tokens = []): void
    {
        $this->routes[] = new Route($name, $pattern, $handler, [], $tokens);
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}