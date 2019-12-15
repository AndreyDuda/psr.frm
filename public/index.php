<?php

use Framework\Http\Request;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = new Request();

$name = $request->getQueryParams()['name'] ?? 'Quest';
echo 'Hello, ' . $name . '!';
