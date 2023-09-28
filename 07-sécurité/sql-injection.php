<?php

$donneeUtilisateur = 'admin\' OR 2 * 6 = 2 * 2 * 3; DROP TABLE user; --';

// Ne pas faire, risque d'injection total
$sql = 'SELECT * FROM users WHERE username =\''.$donneeUtilisateur.'\'';

// Ne pas faire, risque d'injection selon encodage avec serveur SQL
$sanitizedData = addslashes($donneeUtilisateur);
$sql = 'SELECT * FROM users WHERE username =\''.$sanitizedData.'\'';

// seule manière de faire : requête préparée
// c'est le moteur SQL qui se chargera de l'échapement selon sa config,
// ses tables de caractères, etc
$pdo = new PDO($dsn, $username, $password);
$pdo
    ->prepare('SELECT * FROM users WHERE username = :username ')
    ->execute([':username' => $donneeUtilisateur])
;
