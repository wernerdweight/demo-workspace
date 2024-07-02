<?php

namespace App\Entity;

use App\Repository\FormEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormEntityRepository::class)]
class FormEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Formulary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormulary(): ?string
    {
        return $this->Formulary;
    }

    public function setFormulary(?string $Formulary): static
    {
        $this->Formulary = $Formulary;

        return $this;
    }
}
