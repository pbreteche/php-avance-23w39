<?php

namespace Pierre\DemoOrm\Entity;

use Doctrine\ORM\Mapping as ORM;

// Entity, configuration sur la gestion de l'objet PHP
//      par l'entity manager.
//Table, configuration liée à la table en base de données
#[ORM\Entity]
#[ORM\Table]
class Article
{
    // Id identifie les instances auprès de l'entity manager
    // la propriété peux s'appeler comme on veut, ainsi que la colonne
    // si l'entity manager suit déjà une instance d'Article avec telle valeur d'Id,
    // celle-ci n'aura pas besoin d'être rechargée depuis la base (pas de seconde requête SQL)
    #[ORM\Id]
    // GeneratedValue, laisse la base générer toute seule la valeur.
    // Par exemple, si MySQL => autoincrement
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    // Type Doctrine : correspondance entre type PHP et type SQL
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): Article
    {
        $this->title = $title;

        return $this;
    }
}
