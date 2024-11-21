<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $position = null;

    #[ORM\Column(length: 255)]
    private ?string $locationText = null;

    #[ORM\Column(type: 'boolean')]
    private bool $isEnding = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $endingType = null;

    #[ORM\OneToMany(mappedBy: 'fromLocation', targetEntity: Choice::class, cascade: ['persist', 'remove'])]
    private Collection $choices;

    public function __construct()
    {
        $this->choices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getLocationText(): ?string
    {
        return $this->locationText;
    }

    public function setLocationText(string $locationText): static
    {
        $this->locationText = $locationText;

        return $this;
    }

    public function isEnding(): bool
    {
        return $this->isEnding;
    }

    public function setEnding(bool $isEnding): static
    {
        $this->isEnding = $isEnding;

        return $this;
    }

    public function getEndingType(): ?string
    {
        return $this->endingType;
    }

    public function setEndingType(?string $endingType): static
    {
        $this->endingType = $endingType;

        return $this;
    }

    public function getChoices(): Collection
    {
        return $this->choices;
    }

    public function addChoice(Choice $choice): static
    {
        if (!$this->choices->contains($choice)) {
            $this->choices->add($choice);
            $choice->setFromLocation($this);
        }

        return $this;
    }

    public function removeChoice(Choice $choice): static
    {
        if ($this->choices->removeElement($choice)) {
            if ($choice->getFromLocation() === $this) {
                $choice->setFromLocation(null);
            }
        }

        return $this;
    }
}
