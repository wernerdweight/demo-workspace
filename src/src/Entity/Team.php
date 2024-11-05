<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use function Symfony\Component\String\s;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $name = null;

  #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $established = null;

  /**
   * @var Collection<int, Player>
   */
  #[ORM\OneToMany(targetEntity: Player::class, mappedBy: 'team')]
  private Collection $players;

  #[ORM\Column(length: 255, nullable: true)]
  private ?string $canonical = null;

  public function __construct()
  {
    $this->players = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): static
  {
    $this->name = $name;
    $this->canonical = s($name)->ascii()->lower()->replace(' ', '-');

    return $this;
  }

  public function getEstablished(): ?\DateTimeInterface
  {
    return $this->established;
  }

  public function setEstablished(?\DateTimeInterface $established): static
  {
    $this->established = $established;

    return $this;
  }

  /**
   * @return Collection<int, Player>
   */
  public function getPlayers(): Collection
  {
    return $this->players;
  }

  public function addPlayer(Player $player): static
  {
    if (!$this->players->contains($player)) {
      $this->players->add($player);
      $player->setTeam($this);
    }

    return $this;
  }

  public function removePlayer(Player $player): static
  {
    if ($this->players->removeElement($player)) {
      // set the owning side to null (unless already changed)
      if ($player->getTeam() === $this) {
        $player->setTeam(null);
      }
    }

    return $this;
  }

  public function getCanonical(): ?string
  {
    return $this->canonical;
  }

  public function setCanonical(?string $canonical): static
  {
    $this->canonical = $canonical;

    return $this;
  }
}
