<?php

//$response = http_request('BREW', 'myAwesomeCoffeePot?cream=true');
var_dump($response);

$url = 'http://localhost:4242/restServer.php?url=/blog/post';

$curl = curl_init($url);
//curl_setopt($curl, CURLOPT_POST, 1);
//curl_setopt($curl, CURLOPT_PUT, 1);
//curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
//curl_setopt($curl, CURLOPT_HTTPGET, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);

var_dump(json_decode($response));
echo "\n";

file_get_contents($url, false, stream_context_create(['http'=>['method'=>'POST']]));
