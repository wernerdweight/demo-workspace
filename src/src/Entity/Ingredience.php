<?php

namespace App\Entity;

use App\Repository\IngredienceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredienceRepository::class)]
class Ingredience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Recepty $cena = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCena(): ?Recepty
    {
        return $this->cena;
    }

    public function setCena(?Recepty $cena): static
    {
        $this->cena = $cena;

        return $this;
    }
}
