<?php
declare(strict_types=1);

namespace Framework\Http\router;

class Result
{
    private $name;
    private $handler;
    private $attributes;

    public function __construct(string $name, $handler, array $attributes)
    {
        $this->name = $name;
        $this->handler = $handler;
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }


}