<?php

namespace App\Entity;

use App\Repository\ReceptyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(length: 255)]
    private ?string $nazev = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $postup = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagepath = null;

    /**
     * @var Collection<int, IngredienceReceptu>
     */
    #[ORM\OneToMany(targetEntity: IngredienceReceptu::class, mappedBy: 'recept', orphanRemoval: true)]
    private Collection $ingredience;

    public function __construct()
    {
        $this->ingredience = new ArrayCollection();
    }

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

    public function getNazev(): ?string
    {
        return $this->nazev;
    }

    public function setNazev(string $nazev): static
    {
        $this->nazev = $nazev;

        return $this;
    }

    public function getPostup(): ?string
    {
        return $this->postup;
    }

    public function setPostup(string $postup): static
    {
        $this->postup = $postup;

        return $this;
    }

    public function getImagepath(): ?string
    {
        return $this->imagepath;
    }

    public function setImagepath(?string $imagepath): static
    {
        $this->imagepath = $imagepath;

        return $this;
    }

    /**
     * @return Collection<int, IngredienceReceptu>
     */
    public function getIngredience(): Collection
    {
        return $this->ingredience;
    }

    public function addIngredience(IngredienceReceptu $ingredience): static
    {
        if (!$this->ingredience->contains($ingredience)) {
            $this->ingredience->add($ingredience);
            $ingredience->setRecept($this);
        }

        return $this;
    }

    public function removeIngredience(IngredienceReceptu $ingredience): static
    {
        if ($this->ingredience->removeElement($ingredience)) {
            // set the owning side to null (unless already changed)
            if ($ingredience->getRecept() === $this) {
                $ingredience->setRecept(null);
            }
        }

        return $this;
    }
}
