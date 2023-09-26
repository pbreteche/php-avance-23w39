<?php

class ProxyClass
{
    public function __construct(private VeryComplexClass $class)
    {
    }

    // Seulement quelques méthodes simples, avec peu de paramètres, des valeurs par défaut, etc.

    public function sendHttpRequest() {
        $this->class
            ->openHttpConnection()
            ->setTtl()
            ->setMethod()
        ;
    }
}
