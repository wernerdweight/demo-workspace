<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $webdesign = null;

    #[ORM\Column(length: 255)]
    private ?string $uiuxdesign = null;

    #[ORM\Column(length: 255)]
    private ?string $ppc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWebdesign(): ?string
    {
        return $this->webdesign;
    }

    public function setWebdesign(string $webdesign): static
    {
        $this->webdesign = $webdesign;

        return $this;
    }

    public function getUiuxdesign(): ?string
    {
        return $this->uiuxdesign;
    }

    public function setUiuxdesign(string $uiuxdesign): static
    {
        $this->uiuxdesign = $uiuxdesign;

        return $this;
    }

    public function getPpc(): ?string
    {
        return $this->ppc;
    }

    public function setPpc(string $ppc): static
    {
        $this->ppc = $ppc;

        return $this;
    }
}
