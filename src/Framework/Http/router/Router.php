<?php
declare(strict_types=1);

namespace Framework\Http\router;

use Psr\Http\Message\ServerRequestInterface;

class Router
{
    private $routes;

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    public function match(ServerRequestInterface $request)
    {
        /*return new Result($name, $handlerm $attribute);*/
    }

    public function generate($name, array $params = []): string
    {

    }
}