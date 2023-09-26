<?php

readonly class HttpRequest2
{
    public function __construct(
        array $server,
    ) {
        $this->verb = $server['REQUEST_METHOD'];
        $this->uri = $server['REQUEST_URI'];
    }

    public function getVerb(): string
    {
        return $this->verb;
    }
    
    public function getUri(): string
    {
        return $this->uri;
    }
}