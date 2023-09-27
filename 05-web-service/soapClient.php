<?php

// L'URL ici n'est plus disponible
// à tester avec une autre API
try {

    $client = new SoapClient('http://www.webservicex.net/geoipservice.asmx?WSDL');

    // Les méthodes au niveau du client sont dynamiques et définies à partir du WSDL
    $response = $client->GetGeoIP([
        'IPAddress' => '24.45.67.89',
    ]);
    
    print_r($response);
    
    echo $response->GetGeoIPResult->CountryName . "\n";
} catch (\Exception $e) {}

$client = new SoapClient(null, [
    'location' => 'http://localhost:4242/soapServer.php',
    'uri' => 'demo'
    ]);
$result = $client->double(['number' => 21]);

print_r($result);
