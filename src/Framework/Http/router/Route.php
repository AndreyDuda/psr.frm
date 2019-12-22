<?php
declare(strict_types=1);

namespace Framework\Http\router;

class Route
{
    public $name;
    public $pattern;
    public $handler;
    public $tokens;
    public $methods;

    public function __construct(string $name, string $pattern, $handler, array $tokens, array $methods)
    {
        $this->name = $name;
        $this->pattern = $pattern;
        $this->handler = $handler;
        $this->tokens = $tokens;
        $this->methods = $methods;
    }
}