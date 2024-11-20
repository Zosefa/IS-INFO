<?php

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiplomeRepository::class)]
class Diplome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomDiplome = null;

    #[ORM\Column(length: 255)]
    private ?string $Categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDiplome(): ?string
    {
        return $this->NomDiplome;
    }

    public function setNomDiplome(string $NomDiplome): static
    {
        $this->NomDiplome = $NomDiplome;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): static
    {
        $this->Categorie = $Categorie;

        return $this;
    }
}
