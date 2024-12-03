<?php

namespace App\Entity;

use App\Repository\RecenzeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecenzeRepository::class)]
class Recenze
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $recenze = null;

    #[ORM\Column(length: 255)]
    private ?string $osoba = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecenze(): ?string
    {
        return $this->recenze;
    }

    public function setRecenze(string $recenze): static
    {
        $this->recenze = $recenze;

        return $this;
    }

    public function getOsoba(): ?string
    {
        return $this->osoba;
    }

    public function setOsoba(string $osoba): static
    {
        $this->osoba = $osoba;

        return $this;
    }
}
