<?php

namespace Tests\Framework\Http;

use Framework\Http\Request;
use phpDocumentor\Reflection\Types\Void_;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = new Request();

        self::assertEquals([], $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testQueryparams(): void
    {
        $data = [
            'name' => 'join',
            'age' => 28
        ];

        $request = new Request();
        $request->withQueryParams($data);

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $data = ['title' => 'title'];

        $request = new Request();
        $request->withParsedBody($data);
        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}