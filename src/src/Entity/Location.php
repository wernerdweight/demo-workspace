<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $locationText = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $position = null;

    #[ORM\Column]
    private ?bool $isEnding = null;

    #[ORM\Column(type: Types::JSON)]
    private array $options = [];

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(array $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function isEnding(): ?bool
    {
        return $this->isEnding;
    }

    public function setEnding(bool $isEnding): static
    {
        $this->isEnding = $isEnding;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): static
    {
        $this->options = $options;

        return $this;
    }
}
