<?php

namespace Framework\Http;

class Request
{
    private $queryParams;
    private $parsedBody;

    public function __construct(array $queryParams = [], array $parsedBody = null)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function  withQueryParams($query)
    {
        $this->queryParams = $query;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }

    public function withParsedBody($data)
    {
        $this->parsedBody = $data;
    }
}