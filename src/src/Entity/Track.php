<?php

namespace App\Entity;

use App\Repository\TrackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrackRepository::class)]
class Track
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[Assert\NotBlank]
  #[ORM\Column(length: 255)]
  private ?string $title = null;

  #[Assert\NotBlank]
  #[Assert\Positive]
  #[ORM\Column]
  private ?int $duration = null;

  #[ORM\Column(length: 255, nullable: true)]
  private ?string $isrc = null;

  #[Assert\NotBlank]
  #[ORM\Column(length: 512)]
  private ?string $filepath = null;

  #[ORM\Column]
  private ?bool $sellable = null;

  #[Assert\NotBlank]
  #[ORM\ManyToOne(inversedBy: 'tracks')]
  #[ORM\JoinColumn(nullable: false)]
  private ?Artist $artist = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): static
  {
    $this->title = $title;

    return $this;
  }

  public function getDuration(): ?int
  {
    return $this->duration;
  }

  public function setDuration(int $duration): static
  {
    $this->duration = $duration;

    return $this;
  }

  public function getIsrc(): ?string
  {
    return $this->isrc;
  }

  public function setIsrc(?string $isrc): static
  {
    $this->isrc = $isrc;

    return $this;
  }

  public function getFilepath(): ?string
  {
    return $this->filepath;
  }

  public function setFilepath(?string $filepath): static
  {
    $this->filepath = $filepath;

    return $this;
  }

  public function isSellable(): ?bool
  {
    return $this->sellable;
  }

  public function setSellable(bool $sellable): static
  {
    $this->sellable = $sellable;

    return $this;
  }

  public function getArtist(): ?Artist
  {
    return $this->artist;
  }

  public function setArtist(?Artist $artist): static
  {
    $this->artist = $artist;

    return $this;
  }
}
