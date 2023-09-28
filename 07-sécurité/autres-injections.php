<?php

// caractère de retour à la ligne = séparateur d'en-tête de mail
$mailUtilisateur = "doe@example.com\ncc:autre@example.com";

// SQL wildcard injection
$searchTerm = '%a';
$sql = 'WHERE title LIKE :term';
// dans du PDO, protection contre injection SQL, mais pas de wildcard
$pdo->execute(['term' => $searchTerm.'%']);

// Pour se protéger
// $s chaine de recherche
// $e caractère d'échapement
function like($s, $e) {
    return str_replace(array($e, '_', '%'), array($e.$e, $e.'_', $e.'%'), $s);
}

like($searchTerm, '#'); // retourne '#%a'
$sql = 'WHERE title LIKE :term ESCAPE \'#\'';
$pdo->execute(['term' => like($searchTerm, '#').'%']);
// SQL résultant : 'WHERE title LIKE '#%a%' ESCAPE \'#\''

// Également préter attention à tout format
// json, CSV, microformats internes 
// utiliser tant que possible, des ninliothque spécialisées sur le format utlisé


