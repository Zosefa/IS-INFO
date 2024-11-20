<?php

namespace App\Entity;

use App\Repository\FiliereRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: FiliereRepository::class)]
#[Vich\Uploadable()]
class Filiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomFiliere = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping : "filiere", fileNameProperty : "image")]
    private ?File $FileImage = null;

    #[ORM\ManyToOne]
    private ?Niveaux $IdNiveaux = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFiliere(): ?string
    {
        return $this->NomFiliere;
    }

    public function setNomFiliere(string $NomFiliere): static
    {
        $this->NomFiliere = $NomFiliere;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getFileImage(): ?File
    { 
        return $this->FileImage;
    }

    public function setFileImage(?File $ImageFile): static
    {
        $this->FileImage = $ImageFile;

        return $this;
    }

    public function getIdNiveaux(): ?Niveaux
    {
        return $this->IdNiveaux;
    }

    public function setIdNiveaux(?Niveaux $IdNiveaux): static
    {
        $this->IdNiveaux = $IdNiveaux;

        return $this;
    }
}
