<?php

namespace App\Entity;

use App\Repository\MessageFieldRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageFieldRepository::class)]
class MessageField
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Jmeno = null;

    #[ORM\Column(length: 255)]
    private ?string $Mail = null;

    #[ORM\Column(length: 255)]
    private ?string $Zprava = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJmeno(): ?string
    {
        return $this->Jmeno;
    }

    public function setJmeno(string $Jmeno): static
    {
        $this->Jmeno = $Jmeno;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): static
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getZprava(): ?string
    {
        return $this->Zprava;
    }

    public function setZprava(string $Zprava): static
    {
        $this->Zprava = $Zprava;

        return $this;
    }
}
