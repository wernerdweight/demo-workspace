<?php

namespace App\Entity;

use App\Repository\PortfolioItemsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortfolioItemsRepository::class)]
class PortfolioItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $PackingBox = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $Banners = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $clothing = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $billboards = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $businessCards = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $logos = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $prints = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $patterns = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $photos = null;

    #[ORM\Column(type: Types::OBJECT, nullable: true)]
    private ?object $catalogues = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPackingBox(): ?object
    {
        return $this->PackingBox;
    }

    public function setPackingBox(?object $PackingBox): static
    {
        $this->PackingBox = $PackingBox;

        return $this;
    }

    public function getBanners(): ?object
    {
        return $this->Banners;
    }

    public function setBanners(?object $Banners): static
    {
        $this->Banners = $Banners;

        return $this;
    }

    public function getClothing(): ?object
    {
        return $this->clothing;
    }

    public function setClothing(?object $clothing): static
    {
        $this->clothing = $clothing;

        return $this;
    }

    public function getBillboards(): ?object
    {
        return $this->billboards;
    }

    public function setBillboards(?object $billboards): static
    {
        $this->billboards = $billboards;

        return $this;
    }

    public function getBusinessCards(): ?object
    {
        return $this->businessCards;
    }

    public function setBusinessCards(?object $businessCards): static
    {
        $this->businessCards = $businessCards;

        return $this;
    }

    public function getLogos(): ?object
    {
        return $this->logos;
    }

    public function setLogos(?object $logos): static
    {
        $this->logos = $logos;

        return $this;
    }

    public function getPrints(): ?object
    {
        return $this->prints;
    }

    public function setPrints(?object $prints): static
    {
        $this->prints = $prints;

        return $this;
    }

    public function getPatterns(): ?object
    {
        return $this->patterns;
    }

    public function setPatterns(?object $patterns): static
    {
        $this->patterns = $patterns;

        return $this;
    }

    public function getPhotos(): ?object
    {
        return $this->photos;
    }

    public function setPhotos(?object $photos): static
    {
        $this->photos = $photos;

        return $this;
    }

    public function getCatalogues(): ?object
    {
        return $this->catalogues;
    }

    public function setCatalogues(?object $catalogues): static
    {
        $this->catalogues = $catalogues;

        return $this;
    }
}
