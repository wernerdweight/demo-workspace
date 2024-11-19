<?php

namespace App\Entity;

use App\Repository\IngredienceReceptuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredienceReceptuRepository::class)]
class IngredienceReceptu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mnozstvi = null;

    #[ORM\ManyToOne(inversedBy: 'ingredienc')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Recepty $recept = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ingredience $ingredience = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMnozstvi(): ?string
    {
        return $this->mnozstvi;
    }

    public function setMnozstvi(string $mnozstvi): static
    {
        $this->mnozstvi = $mnozstvi;

        return $this;
    }

    public function getRecept(): ?Recepty
    {
        return $this->recept;
    }

    public function setRecept(?Recepty $recept): static
    {
        $this->recept = $recept;

        return $this;
    }

    public function getIngredience(): ?Ingredience
    {
        return $this->ingredience;
    }

    public function setIngredience(?Ingredience $ingredience): static
    {
        $this->ingredience = $ingredience;

        return $this;
    }
}
