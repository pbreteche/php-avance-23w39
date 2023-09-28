<?php

namespace Pierre\DemoOrm\Repository;

use Doctrine\ORM\EntityRepository;
use Pierre\DemoOrm\Entity\Article;

class ArticleRepository extends EntityRepository
{
    public function findByTitleStartingWith(string $titlePrefix)
    {
        return $this
            ->getEntityManager()
            ->createQuery('SELECT a FROM '.Article::class.' a WHERE a.title LIKE :pattern')
            ->setParameter('pattern', $titlePrefix.'%')
            ->getResult()
        ;
    }

    public function findByTitleStartingWith2(string $titlePrefix, bool $withAuthor = false)
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->andWhere('a.title LIKE :pattern')
        ;
        if ($withAuthor) {
            $queryBuilder->addSelect('a.writtenBy');
        }

        return $queryBuilder
            ->getQuery()
            ->setParameter('pattern', $titlePrefix.'%')
            ->getResult()
        ;
    }
}
