<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['teaser', 'full'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['teaser', 'full'])]
    #[Assert\NotBlank]
    #[Assert\Length(max: 65)]
    private ?string $title = null;

    #[Groups(['full'])]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $body = null;

    #[ORM\Column]
    #[Groups(['teaser', 'full'])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(length: 255, enumType: PostStateEnum::class)]
    private PostStateEnum $state = PostStateEnum::Draft;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): static
    {
        $this->body = $body;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getState(): PostStateEnum
    {
        return $this->state;
    }

    public function setState(PostStateEnum $state): static
    {
        $this->state = $state;

        return $this;
    }
}
