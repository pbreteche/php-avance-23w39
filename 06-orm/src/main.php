<?php

use Pierre\DemoOrm\Entity\Article;

require_once __DIR__.'/../src/bootstrap.php';

$article = new Article();
$article->setTitle('Il est '.(new DateTimeImmutable())->format('H:i:s'));

// Indique à l'entity manager que cette nouvelle instance d'Article
// doit être gérée par Doctrine et synchronisée en base
$entityManager->persist($article);

// Calcule toutes les modifications actuellement suivies par l'entity manager
// (nouvelles entités, entités modifiées, entités supprimées)
// Applique ensuite les modifications sur la base
$entityManager->flush();
