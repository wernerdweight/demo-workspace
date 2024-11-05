<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $firstName = null;

  #[ORM\Column(length: 255, nullable: true)]
  private ?string $lastName = null;

  #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $bornAt = null;

  #[ORM\Column(nullable: true)]
  private ?array $positions = null;

  #[ORM\Column(nullable: true)]
  private ?int $jerseyNumber = null;

  #[ORM\Column(length: 5, nullable: true)]
  private ?string $preferredFoot = null;

  #[ORM\ManyToOne(inversedBy: 'players')]
  private ?Team $team = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getFirstName(): ?string
  {
    return $this->firstName;
  }

  public function setFirstName(string $firstName): static
  {
    $this->firstName = $firstName;

    return $this;
  }

  public function getLastName(): ?string
  {
    return $this->lastName;
  }

  public function setLastName(?string $lastName): static
  {
    $this->lastName = $lastName;

    return $this;
  }

  public function getBornAt(): ?\DateTimeInterface
  {
    return $this->bornAt;
  }

  public function setBornAt(?\DateTimeInterface $bornAt): static
  {
    $this->bornAt = $bornAt;

    return $this;
  }

  public function getPositions(): ?array
  {
    return $this->positions;
  }

  public function setPositions(?array $positions): static
  {
    $this->positions = $positions;

    return $this;
  }

  public function getJerseyNumber(): ?int
  {
    return $this->jerseyNumber;
  }

  public function setJerseyNumber(?int $jerseyNumber): static
  {
    $this->jerseyNumber = $jerseyNumber;

    return $this;
  }

  public function getPreferredFoot(): ?string
  {
    return $this->preferredFoot;
  }

  public function setPreferredFoot(?string $preferredFoot): static
  {
    $this->preferredFoot = $preferredFoot;

    return $this;
  }

  public function getTeam(): ?Team
  {
      return $this->team;
  }

  public function setTeam(?Team $team): static
  {
      $this->team = $team;

      return $this;
  }
}
