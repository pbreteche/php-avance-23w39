<?php

class HttpRequestBridge
{
    public function request2FromRequest1(HttpRequest1 $r1): HttpRequest2
    {
        return new HttpRequest2([
            'REQUEST_METHOD' => $r1->getMethod(),
            'REQUEST_URI' => $r1->getResource(),
        ]);
    }
}
