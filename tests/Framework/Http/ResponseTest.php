<?php

namespace Tests\Framework\Http;

use Framework\Http\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testEmpty(): void
    {
        $response = new Response($body = 'Body');

        self::assertEquals($body, $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals(Response::$phrase[200], $response->getReasonPhrase());
    }

    public function test404(): void
    {
        $response = new Response($body = 'Empty', $status = 404);

        self::assertEquals($body, $response->getBody());
        self::assertEquals($status, $response->getStatusCode());
        self::assertEquals(Response::$phrase[404], $response->getReasonPhrase());
    }

    public function testHeaders(): void
    {
        $response = new Response('');
        $response->withHeader($name1 = 'x-Header-1', $value1 = 'value_1');
        $response->withHeader($name2 = 'x-Header-2', $value2 = 'value_2');

        self::assertEquals([$name1 => $value1, $name2 => $value2], $response->getHeaders());
    }

}