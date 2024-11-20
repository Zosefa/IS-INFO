<?php

namespace App\Entity;

use App\Repository\NiveauxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NiveauxRepository::class)]
class Niveaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Niveaux = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveaux(): ?string
    {
        return $this->Niveaux;
    }

    public function setNiveaux(string $Niveaux): static
    {
        $this->Niveaux = $Niveaux;

        return $this;
    }
}
