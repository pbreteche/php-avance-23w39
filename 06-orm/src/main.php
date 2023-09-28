<?php

use Pierre\DemoOrm\Entity\Article;
use Pierre\DemoOrm\Entity\Author;

require_once __DIR__.'/../src/bootstrap.php';

$newArticle = new Article();
$newArticle->setTitle('Il est '.(new DateTimeImmutable())->format('H:i:s'));

$author = new Author();
$author->setName('Pierre');

$newArticle->setWrittenBy($author);

// Indique à l'entity manager que cette nouvelle instance d'Article
// doit être gérée par Doctrine et synchronisée en base
$entityManager->persist($newArticle);
$entityManager->persist($author);

// Calcule toutes les modifications actuellement suivies par l'entity manager
// (nouvelles entités, entités modifiées, entités supprimées)
// Applique ensuite les modifications sur la base
$entityManager->flush();

$articleRepository = $entityManager->getRepository(Article::class);

$articleCount = $articleRepository->count([]);

echo $articleCount."\n";

$allArticles = $articleRepository->findAll();
foreach ($allArticles as $article) {
    echo $article->getTitle()."\n";
}
$article1 = $articleRepository->find(1);
if ($article1) {
    echo $article1->getTitle()."\n";
}

// permet de donner des critères de filtre, tri, limiter le nombre de résultats
$someArticles = $articleRepository->findBy([], ['title' => 'desc'], 10);
