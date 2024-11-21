<?php

namespace App\Entity;

use App\Repository\ChoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoiceRepository::class)]
class Choice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Location::class, inversedBy: 'choices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $fromLocation = null;

    #[ORM\ManyToOne(targetEntity: Location::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $toLocation = null;

    #[ORM\Column(length: 255)]
    private ?string $choiceText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromLocation(): ?Location
    {
        return $this->fromLocation;
    }

    public function setFromLocation(?Location $fromLocation): static
    {
        $this->fromLocation = $fromLocation;

        return $this;
    }

    public function getToLocation(): ?Location
    {
        return $this->toLocation;
    }

    public function setToLocation(?Location $toLocation): static
    {
        $this->toLocation = $toLocation;

        return $this;
    }

    public function getChoiceText(): ?string
    {
        return $this->choiceText;
    }

    public function setChoiceText(string $choiceText): static
    {
        $this->choiceText = $choiceText;

        return $this;
    }
}
