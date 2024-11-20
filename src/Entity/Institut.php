<?php

namespace App\Entity;

use App\Repository\InstitutRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: InstitutRepository::class)]
#[Vich\Uploadable()]
class Institut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[Vich\UploadableField(mapping : "institut", fileNameProperty : "logo")]
    private ?File $FileImage = null;

    #[ORM\Column(length: 255)]
    private ?string $nomInstitut = null;

    #[ORM\Column(length: 3000)]
    private ?string $description = null;

    #[ORM\Column(length: 3000)]
    private ?string $agrement = null;

    #[ORM\Column(length: 1000)]
    private ?string $siege = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Tel1 = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Tel2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

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

    public function getNomInstitut(): ?string
    {
        return $this->nomInstitut;
    }

    public function setNomInstitut(string $nomInstitut): static
    {
        $this->nomInstitut = $nomInstitut;

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

    public function getAgrement(): ?string
    {
        return $this->agrement;
    }

    public function setAgrement(string $agrement): static
    {
        $this->agrement = $agrement;

        return $this;
    }

    public function getSiege(): ?string
    {
        return $this->siege;
    }

    public function setSiege(string $siege): static
    {
        $this->siege = $siege;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->Tel1;
    }

    public function setTel1(?string $Tel1): static
    {
        $this->Tel1 = $Tel1;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->Tel2;
    }

    public function setTel2(?string $Tel2): static
    {
        $this->Tel2 = $Tel2;

        return $this;
    }

    public function getEmail2(): ?string
    {
        return $this->email2;
    }

    public function setEmail2(?string $email2): static
    {
        $this->email2 = $email2;

        return $this;
    }
}
