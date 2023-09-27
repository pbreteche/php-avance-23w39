
<?php

function double(int $number)
{
    return [
        "result" => $number *2,
    ];
}

$server = new SoapServer(null, ['uri' => 'http://locahost:4242/soapServer.php']);

$server->addFunction('double');

$server->handle();

