<?php

namespace App\Entity;

use App\Repository\ReceptyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceptyRepository::class)]
class Recepty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Obtiznost = null;

    #[ORM\Column(length: 255)]
    private ?string $Cas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObtiznost(): ?int
    {
        return $this->Obtiznost;
    }

    public function setObtiznost(int $Obtiznost): static
    {
        $this->Obtiznost = $Obtiznost;

        return $this;
    }

    public function getCas(): ?string
    {
        return $this->Cas;
    }

    public function setCas(string $Cas): static
    {
        $this->Cas = $Cas;

        return $this;
    }
}
