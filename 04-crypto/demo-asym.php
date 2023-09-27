<?php

$message = 'Message top confidentiel. S\'autodétruira après lecture';

// en général, pas besoin de générer une nouvelle clé
// à chaque exécution, c'est l'environnement qui fournit la clé
$keyPair = openssl_pkey_new();

$details = openssl_pkey_get_details($keyPair);
// Possibilité d'accéder au contenu de la clé publique
// par exemple pour la transmettre à un interlocuteur
var_dump($details['key']);

openssl_pkey_export($keyPair, $privateKey);

openssl_private_encrypt($message, $cryptedMessage, $privateKey);

echo $cryptedMessage."\n";

openssl_public_decrypt($cryptedMessage, $decryptedMessage, $details['key']);

echo $decryptedMessage."\n";
