<?php

readonly class HttpRequest1
{
    public function __construct(
        private string $method,
        private string $resource,
    ) {
    }

    public function getMethod(): string
    {
        return $this->method;
    }
    
    public function getResource(): string
    {
        return $this->method;
    }
}
