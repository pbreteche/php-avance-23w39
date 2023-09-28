<?php

$donneeUtilisateur = '<script> console.log("coucou")</script>';

// Ne pas faire, risque d'injection total
echo $donneeUtilisateur;

// Ne pas faire, risque d'injection total
$output = '<p>'.$donneeUtilisateur.'</p>';

// Ne pas faire, risque d'injection
// si donnee = "<scr<strong>ipt>console.log ..."
// le fait de faire sauter la balise strong, fait apparaitre script
// cf https://www.php.net/manual/fr/function.strip-tags.php#refsect1-function.strip-tags-notes
$output = '<p>'.strip_tags($donneeUtilisateur).'</p>';

// seule manière de faire : htmlspecialchars
$output = '<p>'.htmlspecialchars($donneeUtilisateur).'</p>';

// idéalement, utiliser un moteur de template qui le fait automatiquement
