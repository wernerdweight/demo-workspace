<?php

namespace App\Entity;

use App\Repository\IngredienceRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: IngredienceRepository::class)]
class Ingredience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $cena = null;

    #[ORM\Column(length: 255)]
    private ?string $nazev = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCena(): ?int
    {
        return $this->cena;
    }

    public function setCena(?int $cena): static
    {
        $this->cena = $cena;

        return $this;
    }

    public function getNazev(): ?string
    {
        return $this->nazev;
    }

    public function setNazev(string $nazev): static
    {
        $this->nazev = $nazev;

        return $this;
    }
}
