<?php

namespace App\Entity;

use App\Repository\PortfolioItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortfolioItemRepository::class)]
class PortfolioItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(nullable: true)]
    private ?array $FirstImage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(nullable: true)]
    private ?array $SecondImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getFirstImage(): ?array
    {
        return $this->FirstImage;
    }

    public function setFirstImage(?array $FirstImage): static
    {
        $this->FirstImage = $FirstImage;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getSecondImage(): ?array
    {
        return $this->SecondImage;
    }

    public function setSecondImage(?array $SecondImage): static
    {
        $this->SecondImage = $SecondImage;

        return $this;
    }
}
