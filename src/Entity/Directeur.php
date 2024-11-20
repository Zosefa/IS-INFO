<?php

namespace App\Entity;

use App\Repository\DirecteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: DirecteurRepository::class)]
#[Vich\Uploadable()]
class Directeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null; 

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping : "directeur", fileNameProperty : "image")]
    private ?File $FileImage = null;

    #[ORM\Column(length: 5000)]
    private ?string $motdirecteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

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

    public function getMotdirecteur(): ?string
    {
        return $this->motdirecteur;
    }

    public function setMotdirecteur(string $motdirecteur): static
    {
        $this->motdirecteur = $motdirecteur;

        return $this;
    }
}
