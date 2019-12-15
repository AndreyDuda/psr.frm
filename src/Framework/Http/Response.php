<?php

namespace Framework\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Response implements ResponseInterface
{
    private $headers = [];
    private $body;
    private $statusCode;
    private $reasonPhrase = '';

    public static $phrase = [
        200 => 'OK',
        301 => 'Moved Permanently',
        400 => 'Bad Request',
        401 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    ];

    public function __construct($body, $statusCode = 200)
    {
        $this->body = $body instanceof StreamInterface ? $body : new Stream($body);
        $this->statusCode = $statusCode;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): void
    {
        $this->body = $body;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getReasonPhrase()
    {
        if (!$this->reasonPhrase && isset(self::$phrase[$this->statusCode])) {
            $this->reasonPhrase = self::$phrase[$this->statusCode];
        }
        return $this->reasonPhrase;
    }

    public function withStatus($code, $reasonPhrase = ''): void
    {
        $this->statusCode = $code;
        $this->reasonPhrase = $reasonPhrase;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function hasHeader($header): bool
    {
        return isset($this->headers[$header]);
    }


    public function getHeader($header)
    {
        return $this->hasHeader($header) ? $this->headers[$header] : null;
    }

    public function withHeader($header, $value): void
    {
        $this->headers[$header] = $value;
    }

    public function getProtocolVersion(){}
    public function withProtocolVersion($version){}
    public function getHeaderLine($name){}
    public function withAddedHeader($name, $value){}
    public function withoutHeader($name){}

}