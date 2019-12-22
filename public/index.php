<?php

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use Framework\Http\router\RouteCollection;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Framework\Http\router\Router;
use Framework\Http\Router\Exception\RequestNotMatchedException;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$routes = new RouteCollection();
$routes->get('home', '/', function (ServerRequestInterface $request) {
    $name = $request->getQueryParams()['name'] ?? 'Guest';
    return new HtmlResponse('Hello' . $name . ':');
});
$routes->get('about', '/about', function () {
    return new HtmlResponse('I am a simple site');
});
$routes->get('blog', '/blog', function () {
    return new JsonResponse([
        ['id' => 2, 'title' => 'The Second Post'],
        ['id' => 1, 'title' => 'Thw first Post']
    ]);
});
$routes->get('blog_show', '/bog/{id}', function (ServerRequestInterface $request) {
    $id = $request->getAttribute('id');
    if ($id > 5) {
        return new JsonResponse(['error' => 'Undefined page'], 404);
    }
    return new JsonResponse(['id' => $id, 'title' => 'Post #' . $id]);
}, ['id' => '\d+']);

$router = new Router($routes);
$request = ServerRequestFactory::fromGlobals();
try {
    $result = $router->match($request);
    foreach ($result->getAttributes() as $attribute => $value) {
        $request = $request->withAttribute($attribute, $value);
    }
    $action = $result->getHandler();
    $response = $action($request);
} catch(RequestNotMatchedException $e) {
    $response = new JsonResponse(['error' => 'Undefined page'], 404);
}

$response = $response->witHaader('X-developer', 'Duda');

$emitter = new SapiEmitter();
$emitter->emit($response);
