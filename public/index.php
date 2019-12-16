<?php

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = new HtmlResponse('Hello, ' . $name . '!');
$response->withHeader('X-Developer', 'Duda');

$emitter = new SapiEmitter();
$emitter->emit($response);
